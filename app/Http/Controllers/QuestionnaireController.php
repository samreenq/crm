<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UsersRepositoriesInterface;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Support\Facades\File;
use PDF;

class QuestionnaireController extends Controller
{
    private $usersRepository;
    public function __construct(UsersRepositoriesInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    public function index()
    {
        $pageTitle = "Dashboard";
        $plans = $this->usersRepository->fetchAllPlans();
        return view("web.index", compact("pageTitle", "plans"));
    }

    public function userLoadPlan(Request $request)
    {
        $planId = $request->id;
        $plan = $this->usersRepository->fetchPlanDetailByPlanId($planId);
        $route = route('user.proceed-with-plan', ['id' => $planId]);
        $checkUserLogin = $this->userCheckPlanLogin();
        if (!$checkUserLogin)
            return $this->Code300("Please login first, before proceeding to Purchasing");
        else {
            if (session()->get("accountType") == "paid") {
                if (session()->get("planStatus") == 0) {
                    $previousUrl = route("user.dashboard");
                    $message = "You have already subscribed to  " . session()->get("planName") . " , please unsubscribe to this first";
                    $this->jsonMessage2($message, "error", $previousUrl);
                    return $this->Code200("You are already logged in", 'Welcome', $previousUrl);
                }

            }

            return $this->Code200("You are already logged in", 'Welcome', $route);
        }

    }

    public function userCheckPlanLogin()
    {
        if (session()->get('userId') == "")
            return false;
        else
            return true;
    }

    public function UserPlans()
    {
        $pageTitle = "User Plan";
        return view("web.plans.user_plans", compact("pageTitle"));
    }

    public function purchasePlan()
    {
        $pageTitle = "Purchase Plan";
        $id = session()->get('userId');
        return view("web.plans.purchase_plan", compact("id", "pageTitle"));
    }

    public function savePlan(Request $request)
    {
        $data = $request->all();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $customer = $stripe->customers->create([
            'source' => $data['token'],
            "name" => $data['c_name'],
            "email" => $data['c_email'],
            "description" => "purchased from Sever's User name = " . session()->get('userName') . " and his userId= " . session()->get('userId'),
        ]);
        $data1 = $stripe->subscriptions->create([
            "customer" => $customer->id,
            'items' => [
                    ['price' => env('STRIPE_PRODUCT_KEY')],
                ],
        ]);

        if (!empty($data1)) {
            $invoice = $stripe->invoices->create([
                'customer' => $customer->id,
            ]);
            $amount = $data1['items']['data'][0]['price']['unit_amount'] / 100;
            $subscriptionData['start_date'] = $data1['current_period_start'];
            $subscriptionData['end_date'] = $data1['current_period_end'];
            $subscriptionData['sub_id'] = $data1['id'];
            $subscriptionData['customer_id'] = $data1['customer'];
            $subscriptionData['user_id'] = session()->get('userId');
            $subscriptionData['userSubscribedDate'] = $data1['created'];
            $subscriptionData['amount'] = $amount;
            $subscriptionData['userData'] = $data;
            $saveUserPlan = $this->usersRepository->saveUserPlan($subscriptionData);
            if ($saveUserPlan == "done")
                return $this->Code200("You have successfully subscribed the Questionnaire ", 'Welcome');
            else
                return $this->Code300("Something Went wrong, Please Try Again");
        } else
            return $this->Code300("You don't have enough credit in your account");
    }

    public function UserPlansAjax(Request $request)
    {
        $userId = $request->user_id;
        $data = $this->usersRepository->fetchAllPlansOfUser($userId);
        return view("web.plans.ajax.user_plans_ajax", compact("data"))->render();
    }

    public function editUserCompanyModal(Request $request)
    {
        $companyId = $request->id;
        $data = $this->usersRepository->fetchIndividualCompany($companyId);
        return view("questionnaire.ajax.edit_user_company", compact("data"))->render();
    }

    public function updateUserCompanyModal(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'c_name' => 'required',
                'c_email' => 'required',
                'c_status' => 'required',
            ],
            [
                'c_name.required' => 'The Company Name is required.',
                'c_email.required' => 'The Company Email where Hospital is required.',
                'c_status.required' => 'The Status should be defined',
            ]
        );
        if ($validator->fails()) {
            return $this->Code302($validator->errors()->all());
        } else {
            $data = $request->all();

            $update = $this->usersRepository->updateCompanyInformation($data);
            if (!$update)
                return $this->Code300("You have made an invalid Request");
            else {
                $previousUrl = url()->previous();
                $this->jsonMessage2("Company is Successfully updated", "success", $previousUrl);
                return $this->Code200("Company is Successfully updated", 'Update Company');
            }

        }
    }



    public function viewQuestionnaire($code)
    {
        $pageTitle = "Questionnaires";
        if (empty($code))
            return $this->jsonMessage("Something went Wrong, please try again", "error", "user-register");
        $id = decodeFrom16Char($code);
        $status = $this->usersRepository->checkCompanyData($id);
        if ($status == "free" || $status == "expired")
            return view("questionnaire.error_page", compact("pageTitle", "status"));
        else if (empty($status))
            return view("questionnaire.error_page", compact("pageTitle", "status"));
        $data = $this->usersRepository->fetchCompanyData($id);
        return view("questionnaire.view_questionnaire", compact("pageTitle", "data", "code"));
    }
    public function submitQuestionaire(Request $request)
    {
        $data = $request->all();
    
        $code = $data['code'];
        $id = decodeFrom16Char($code);
        $status = $this->usersRepository->checkCompanyData($id);
        if ($status == "free" || $status == "expired")
            return $this->Code300("User is Expired");
        $companyData = $this->usersRepository->fetchCompanyData($id);
        $mainArray = json_decode($data['jsonArray'], true);

        $dataToMail['companyData'] = $companyData;
        $dataToMail['mainArray'] = $mainArray;
        
        Mail::to($companyData['c_email'])->send(new \App\Mail\QuestionaireFeedback($dataToMail));
        return $this->Code200("Thank You For Taking Our Client Questionnaire, We Will Pair You With A Designer That Best Fits Your Needs", 'Form Submit');

    }
    function notifyQuestionaire()
    {
        $pageTitle = "Thank You";
        $message = "Thank You For Taking Our Client Questionnaire, We Will Pair You With A Designer That Best Fits Your Needs";
        return view("questionnaire.notify", compact("pageTitle", "data", "code"));
    }
    public function proceedWithPlan($id)
    {
        $pageTitle = "Proceed with Plan";
        $plan = $this->usersRepository->fetchPlanDetailByPlanId($id);
        return view("web.plans.proceed_with_plan", compact("id", "pageTitle", "plan"))->render();
    }

    public function saveProceededPlan(Request $request)
    {
        $previousUrl = url()->previous();
        $data = $request->all();
        $tempPlan = explode("/", $data['plan']);
        if (!isset($tempPlan[0]) || !isset($tempPlan[1]))
            return $this->jsonMessage2("Invalid data, Please fill form again", "error", $previousUrl);
        $planDetail = $this->usersRepository->fetchPlanDetailByPlanId($tempPlan[0]);
        if (empty($planDetail))
            return $this->jsonMessage2("Invalid Plan, Please fill the form again", "error", $previousUrl);
        foreach ($planDetail[0]['get_sub_plans'] as $value) {
            if ($value['s_plan_id'] == $tempPlan[1]) {

                $productStripeId = $value['sp_stripe_product_id'];
                $amount = $value['sp_amount'];
                $package = $value['sp_name'];
                $currency = $planDetail[0]['plan_currency'];
                $invoice_desc = $planDetail[0]['plan_desc'];
            }
        }
        $invoice['user_id'] = session()->get("userId");
        $invoice['plan_id'] = $tempPlan[0];
        $invoice['s_plan_id'] = $tempPlan[1];
        $invoice['invoice_plan'] = $planDetail[0]['plan_name'];
        $invoice['invoice_package'] = $package;
        $invoice['invoice_amount'] = $amount;
        $invoice['invoice_currency'] = $currency;
        $invoice['invoice_desc'] = $invoice_desc;
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $customer = $stripe->customers->create([
            'source' => $data['stripeToken'],
            "name" => session()->get("userName"),
            "email" => session()->get("userEmail"),
            "description" => session()->get('userName') . " has purchased $package Plan '" . $planDetail[0]['plan_name'] . "' from Sever and his User Id is " . session()->get('userId'),
        ]);
        $data1 = $stripe->subscriptions->create([
            "customer" => $customer->id,
            'items' => [
                    ['price' => $productStripeId],
                ],
        ]);
        if (!empty($data1)) {
            $invoice1 = $stripe->invoices->create([
                'customer' => $customer->id,
            ]);
            $amount = $data1['items']['data'][0]['price']['unit_amount'] / 100;
            $subscriptionData['start_date'] = $data1['current_period_start'];
            $subscriptionData['end_date'] = $data1['current_period_end'];
            $subscriptionData['sub_id'] = $data1['id'];
            $subscriptionData['customer_id'] = $data1['customer'];
            $subscriptionData['user_id'] = session()->get('userId');
            $subscriptionData['userSubscribedDate'] = $data1['created'];
            $subscriptionData['amount'] = $amount;
            $subscriptionData['userData'] = $data;
            $subscriptionData['invoiceData'] = $invoice;
            $subscriptionData['name'] = session()->get("userName");
            $saveUserPlan = $this->usersRepository->saveUserPlan($subscriptionData);
            if (!empty($saveUserPlan)) {
                //User Invoice
                $subscriptionData['invoiceData']['invoice_id'] = $saveUserPlan['invoice_id'];
                $subscriptionData['invoiceData']['created_at'] = $saveUserPlan['created_at'];
                $dataToMail = $subscriptionData;
                Mail::to(session()->get('userEmail'))->send(new \App\Mail\UserInvoice($dataToMail));

                //Admin mail
                $newUrl = route('user.dashboard');

                //Return To Dashboard With Plan Purchased
                return $this->jsonMessage2("Plan Purchased Successfully,Thank You! for choosing this plan", "success", $newUrl);
            } else
                return $this->jsonMessage2("Invalid Plan,Something Went wrong, Please Try Again", "error", $previousUrl);
        } else
            return $this->jsonMessage2("Invalid Plan, You don't have enough credit in your account", "error", $previousUrl);
    }

    public function dashboard()
    {

        $pageTitle = "Dashboard";
        $userId = session()->get("userId");
        $plan = $this->usersRepository->fetchPlanDetailByPlanId(session()->get("planId"));
        $data['company'] = $this->usersRepository->fetchCompanyByUserId($userId);
        $data['files'] = null;
        $directory = public_path('client_courses');

        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $index => $file) {
                $filePaths[basename($file->getPathname())] = basename($file->getPathname());
            }
            if (!empty($filePaths))
                $data['files'] = $filePaths;
        }
        $data['meetings'] = $this->usersRepository->fetchAllMeetingByUserId(session()->get('userId'));


        return view("web.user_dashboard", compact("pageTitle", "plan", "data"));
    }

    public function essence()
    {
        $pageTitle = "Essence Packages";
        $planDetail = $this->usersRepository->fetchPlanDetailByPlanId(1);
        return view("web.plans.plans.essence", compact("pageTitle", "planDetail"))->render();
    }

    public function growth()
    {
        $pageTitle = "Growth Packages";
        $planDetail = $this->usersRepository->fetchPlanDetailByPlanId(2);
        return view("web.plans.plans.growth", compact("pageTitle", "planDetail"))->render();
    }

    public function flourish()
    {
        $pageTitle = "Flourish Packages";
        $planDetail = $this->usersRepository->fetchPlanDetailByPlanId(3);
        return view("web.plans.plans.flourish", compact("pageTitle", "planDetail"))->render();
    }

    public function createQuestionaireAPI()
    {
        $previousUrl = url()->previous();
        if (session()->get('accountType') != "paid") {
            $this->jsonMessage2("You are not Allowed to Create API", "error", $previousUrl);
            return $this->Code300("You are not Allowed to Create API");
        }
        $userId = session()->get("userId");
        $data['company'] = $this->usersRepository->fetchCompanyByUserId($userId);
        if (!empty($data['company'])) {
            $this->jsonMessage2("You have already set an API, delete first then create new", "error", $previousUrl);
            return $this->Code300("You have already set an API, delete first then create new");
        }
        return view("questionnaire.ajax.create_questionnaire")->render();
    }

    public function saveQuestionaireAPI(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'c_name' => 'required',
                'c_email' => "required",
            ],
            [
                'c_name.required' => 'Company Name is Required',
                'c_email.required' => 'Company Email is Required',
            ]
        );
        if ($validator->fails())
            return $this->Code302($validator->errors()->all());
        else {
            $previousUrl = url()->previous();
            $data = $request->all();
            $saveData = $this->usersRepository->SaveCompanyData($data);
            if (empty($saveData))
                return $this->code300("Something went wrong, Please try again!");
            else {
                $this->jsonMessage2("You have created an API for Questionaire, successfully", "success", $previousUrl);
                return $this->Code200("You have created an API for Questionaire, successfully", 'Create Questionaire');
            }

        }
    }

    public function deleteUserCompany(Request $request)
    {
        $previousUrl = url()->previous();
        $data = $request->all();
        if (empty($data['id'])) {
            $this->jsonMessage2("Something went wrong, Please try again", "error", $previousUrl);
            return $this->Code300("Something went wrong, Please try again");
        }
        $delete = $this->usersRepository->removeCompanyInformation($request->all());
        if (!$delete) {
            $this->jsonMessage2("Something went wrong, Please try again!", "error", $previousUrl);
            return $this->code300("Something went wrong, Please try again!");
        } else {
            $this->jsonMessage2("You have sucessfully removed the Company", "success", $previousUrl);
            return $this->Code200("You have sucessfully removed the Company", 'Delete Company');
        }

    }

    public function dashboardSettings()
    {
        $pageTitle = "Dashboard Settings";
        return view("web.user_dashboard_settings", compact("pageTitle"));
    }

    public function purchaseHistory()
    {
        $pageTitle = "Purhcased History";
        $data = $this->usersRepository->fetchInvoicesByUserId(session()->get("userId"));

        return view("web.purchase_history", compact("pageTitle", "data"));

    }

    public function viewInvoice($id)
    {
        if (session()->get("userId") == "") {
            return $this->flashMessage("Please Login first", "error", "/login-page");
        }
        $dataDetail['invoiceData'] = $this->usersRepository->fetchInvoicesByInvoiceId($id);

        return view("web.view_invoice", compact("dataDetail"));
    }

    public function downloadInvoice($id)
    {
        if (session()->get("userId") == "") {
            return $this->flashMessage("Please Login first", "error", "/login-page");
        }
        $dataDetail['invoiceData'] = $this->usersRepository->fetchInvoicesByInvoiceId($id);
        $html = view("web.download_invoice", compact("dataDetail"));
        $pdf = PDF::loadHTML($html);
        return $pdf->download('invoice.pdf');
    }



}