<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UsersRepositoriesInterface;
use App\Http\Requests\SaveUser;
use App\Http\Requests\updateProfile;
use Stripe;

class LoginController extends Controller
{
    private $usersRepository;
    public function __construct(UsersRepositoriesInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    function index()
    {
        $pageTitle = "Login/Register";
        $pageDesc = "Please Register / Login to your account";
        if (session()->get("userId") != "")
            return redirect("/dashboard");
        return view("web.login.login", compact("pageTitle", "pageDesc"));
    }

    public function register()
    {
        $pageTitle = "Login";
        if (session()->get("userId") != "")
            return redirect("/dashboard");
        return view("web.login.register", compact("pageTitle"));
    }

    public function saveRegister(SaveUser $request)
    {
        $data = $this->usersRepository->registerUser($request->all());
        if (empty($data))
            return $this->jsonMessage("Something went Wrong, please try again", "error", "user-register");
        else if ($data = "done")
            return $this->jsonMessage("User is Successfully Registered", "success", "login-page");
    }

    public function login(Request $request)
    {
        $data = $request->all();
        if (empty($data['email']) || empty($data['password']))
            return $this->flashMessage("error", "User fields cannot be left empty", "login-page");

        $databaseUserValidation = $this->usersRepository->checkUserExists($data);
        if ($databaseUserValidation == "Invalid Username and password")
            return $this->flashMessage("error", $databaseUserValidation, "login-page");
        else if($databaseUserValidation == "Account Inactive")
            return $this->flashMessage("error", $databaseUserValidation, "login-page");
        if (isset($databaseUserValidation[0])) {
            if (!is_null($databaseUserValidation[0]['deleted_at']))
                return $this->flashMessage("error", "Sorry, Your Credentials have been revoked", "login-page");
            $request->session()->put([
                "userId" => $databaseUserValidation[0]['id'],
                "userName" => $databaseUserValidation[0]['name'],
                "userEmail" => $databaseUserValidation[0]['email'],
                "userType" => $databaseUserValidation[0]['user_type']
            ]);
            if ($request->session()->has('view_meeting_url'))
                return redirect(session()->get("view_meeting_url"));
            else
                return redirect('/dashboard');
        }

    }

    public function logout()
    {
        session()->flush();
        session()->flash('success', "You have Logged out Succesfully");
        return redirect('/login-page');
    }

    public function updateProfile(updateProfile $request)
    {
        $data = $request->all();
        $previousUrl = route("user.dashboard.settings");
        $update = $this->usersRepository->updateUserProfile($data);
        if ($update) {
            $request->session()->put([
                "userName" => $data['name'],
                "userEmail" => $data['email'],
            ]);

            return $this->jsonMessage2("Profile is updated successfully", "success", $previousUrl);
        }
        return $this->jsonMessage2("Something went wrong", "error", $previousUrl);
    }

    public function userUnsubPackage()
    {
        $previousUrl = route("user.dashboard.settings");
        if (session()->get("accountType") != "paid")
            return $this->jsonMessage2("invalid request", "error", $previousUrl);

        $fetchPlan = $this->usersRepository->fetchPaidPlan(session()->get("userId"));
        $subscriptionId = $fetchPlan[0]['sub_id'];

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $subscription = \Stripe\Subscription::update(
            $subscriptionId,
            // The ID of the subscription you want to cancel
            [
                'cancel_at_period_end' => true,
            ]
        );

        if (!empty($subscription)) {
            $canceledTime = $subscription->canceled_at;
            $lastDate = $subscription->cancel_at;

            $updatePackageStatus = $this->usersRepository->updatePackageStatus($canceledTime, $lastDate, 1);
            if ($updatePackageStatus) {
                $this->jsonMessage2("You have successfully unsubscribe this package", "success", $previousUrl);
                return $this->Code200("You have successfully unsubscribe this package", '');
            }
        }
    }
}
