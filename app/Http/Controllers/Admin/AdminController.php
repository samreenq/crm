<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UsersRepositoriesInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{

    private $usersRepository;
    public function __construct(UsersRepositoriesInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    public function index()
    {
        if (session()->has('userName')) {
            if (session()->get('userType') != 2) {
                return redirect('admin/homepage');
            }
        }
        $pageTitle = "Admin Login";
        return view("web.Admin.login.login", compact("pageTitle"));

    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $userEmail = $request->input('email');
        $userPassword = $request->input('password');

        $databaseUserValidation = $this->usersRepository->checkUserExistsAdmin($userEmail, $userPassword);

      //  print_r($databaseUserValidation); exit;
        if ($databaseUserValidation == "Invalid Username and password") {
            return $this->flashMessage("error", $databaseUserValidation, "/admin");
            // $request->session()->flash("error",$databaseUserValidation);
            // return redirect('/admin');
        }
        if (isset($databaseUserValidation[0])) {
            if (!is_null($databaseUserValidation[0]['deleted_at'])) {
                return $this->flashMessage("error", "Sorry, Your Credentials have been revoked", "/admin");
            }
            $request->session()->put([
                "userId" => $databaseUserValidation[0]['id'],
                "userName" => $databaseUserValidation[0]['name'],
                "userEmail" => $databaseUserValidation[0]['email'],
                "userType" => $databaseUserValidation[0]['user_type'],
            ]);
            if ($request->session()->has('view_meeting_url'))
                return redirect(session()->get("view_meeting_url"));
            else
                return redirect('admin/homepage');
        }
    }

    public function homepage()
    {
        $pageTitle = "Dashboard";
        return view('web.Admin.dashboard')->with("pageTitle", $pageTitle);
    }

    public function viewCompanies()
    {
        $pageTitle = "Manage Companies";
        return view("web.Admin.companies.view")->with("pageTitle", $pageTitle);
    }

    function manageCompanies(Request $request)
    {
        $data = $this->usersRepository->viewAllCompanies();
      //  echo '<pre>'; print_r($data); exit;
        /*if (!empty($data)) {
            foreach ($data as $key => $value) {
                $data[$key]['expiry'] = "-";
                 if (isset($value['get_plan_detail'][0]['sub_id'])) {
                   $stripeSubKey = $value['get_plan_detail'][0]['sub_id'];
                    $checkStatus = $this->usersRepository->checkAccountType($stripeSubKey);
                    $data[$key]['packageUpdate'] = $checkStatus;
                    if ($checkStatus == 'paid') {
                        if (!empty($value['get_plan_detail'][0]['expiry_date']))
                            $data[$key]['expiry'] = "unsubscribed";
                        else
                            $data[$key]['expiry'] = "subscribed";
                    } else {
                        $data[$key]['expiry'] = "-";
                    }
                }

            }
        }*/
        return view("web.Admin.companies.ajax.manage_all_companies", compact("data"))->render();
    }

    function editCompanyByAdmin(Request $request)
    {
        $companyId = $request->id;
        $data = $this->usersRepository->fetchCompanyByCompanyId($companyId);
        return view("web.Admin.companies.ajax.edit_company_modal", compact("data"))->render();
    }

    function updateCompanyByAdmin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'c_name' => 'required',
                'c_email' => 'required',
                'c_id' => "required",
                'status' => 'required'
            ],
            [
                'c_name.required' => 'Company name is Required',
                'c_email.required' => 'Company Email is Required',
                'c_id.required' => 'Company ID is Required',
                'status.required' => 'Company Status Must be defined',
            ]
        );
        if ($validator->fails())
            return $this->Code302($validator->errors()->all());
        else {
            $update = $this->usersRepository->updateCompanyDataByAdmin($request->all());
            if ($update)
                return $this->Code200("Company is Successfully updated", 'Update Company');
            else
                return $this->code300("Something went wrong, please try again, Thank You!");

        }
    }
    function deleteCompanyByAdmin(Request $request)
    {
        $companyId = $request->id;
        if (empty($companyId))
            return $this->code300("Company doesnot exists");
        $data = $this->usersRepository->fetchCompanyByCompanyId($companyId);
        if (empty($data))
            return $this->code300("Company doesnot exists");
        $delete = $this->usersRepository->deleteCompanyByAdminByCompanyId($companyId);
        if ($delete)
            return $this->Code200("Company is Successfully Deleted", 'Delete Company');
        else
            return $this->code300("Something went wrong, Please Try Again ");
    }
    public function logout()
    {
        session()->flush();
        session()->flash('success', "You have Logged out Succesfully");
        return redirect('/admin');
    }

    public function viewInvoices()
    {
        $pageTitle = "Manage Invoices";
        $data = $this->usersRepository->fetchAllInvoicesByAdmin();
        return view("web.Admin.invoices.view")->with("pageTitle", $pageTitle)->with("data", $data);
    }

    public function countOpenMeetings()
    {
        $count = $this->usersRepository->countOpenMeetings();
        return $count;
    }

    public function viewMeetings()
    {
        $pageTitle = "Meetings";
        return view("web.Admin.meetings.view_meetings")->with("pageTitle", $pageTitle);

    }

    function viewActiveMeetingsAjax()
    {
        $data = $this->usersRepository->fetchActiveMeetings();

        return view("web.Admin.meetings.ajax.view_meetings_ajax")->with("data", $data);
    }

    function viewSpecificMeeting($id)
    {
        $id = checkParamUrl($id, "/dashboard");
        $data = $this->usersRepository->fetchMeetingRequest($id);
        // cD($data);
        $pageTitle = "REQUEST000" . $data[0]['m_id'];
        return view("web.Admin.meetings.view_specific_meeting", compact("data", "pageTitle"));
    }

    function adminAcceptingMeeting(Request $request)
    {
        $data = $request->all();
        $processRequest = $this->usersRepository->acceptmeetingRequest($data);
        if ($processRequest) {
            $meetingDetail = $this->usersRepository->fetchMeetingRequestDetailByMDId($data['id']);
            if (!empty($meetingDetail))
                $data['m_id'] = $meetingDetail['m_id'];
            $updateTicketStatus = $this->usersRepository->updateTicketStatus($data['m_id']);
            $previousUrl = route('admin.view.meeting', ['meetingId' => urlParam($data['m_id'])]);
            $sendMail = $this->usersRepository->sendMeetingMail($data['m_id'], "User");
            $this->jsonMessage2("Your Request has been processed, User has been notified", "success");
            return $this->Code200("You have sucessfully removed the Company", 'Delete Company', $previousUrl);
        } else {
            $this->jsonMessage2("Something went wrong, Please try again!", "error");
            return $this->code300("Something went wrong, Please try again!");
        }
    }

    function adminRejectingMeeting(Request $request)
    {
        $data = $request->all();
        return view("web.Admin.meetings.ajax.update_request", compact("data"))->render();
    }

    function adminRejectingMeeting2(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required',
                'time' => 'required',
            ],
            [
                'date.required' => 'Please select your desired date for the meeting. ',
                'time.required' => 'Please select your desired timing for the meeting. ',
            ]
        );
        if ($validator->fails()) {
            return $this->Code302($validator->errors()->all());
        } else {

            $previousUrl = url()->previous();
            $data = $request->all();
            $meetingDetail = $this->usersRepository->fetchMeetingRequestDetailByMDId($data['id']);
            if (!empty($meetingDetail))
                $data['m_id'] = $meetingDetail['m_id'];


            $processRequest = $this->usersRepository->rejectingPreviousAndProcessingNewMeetingRequest($data);
            if (!empty($processRequest)) {
                $sendMail = $this->usersRepository->sendMeetingMail($data['m_id'], "User");
                $previousUrl = route('admin.view.meeting', ['meetingId' => urlParam($data['m_id'])]);
                $this->jsonMessage2("Your Request has been processed, User has been notified", "success");
                return $this->Code200("", '', $previousUrl);
            } else {
                $this->jsonMessage2("Something went wrong, Please try again!", "error");
                return $this->code300("Something went wrong, Please try again!");
            }
        }
    }

    function updateMeetingLink(Request $request)
    {

        $data = $request->all();
        $previousUrl = URL::previous();

        if (empty($data['m_id']))
            return $this->jsonMessage2("Something went wrong, Please try again!", "error", $previousUrl);
        $updateMeetingLink = $this->usersRepository->updateMeetingLink($data);

        if ($updateMeetingLink)
            return $this->jsonMessage2("Meeting Link is successfully updated,", "success", $previousUrl);
        else
            return $this->jsonMessage2("Something went wrong, Please try again!", "error", $previousUrl);
    }

}
