<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UsersRepositoriesInterface;
use App\Models\ModelUsers;
use App\Models\ModelPaidUsers;
use App\Models\ModelCompanies;
use App\Models\ModelPlans;
use App\Models\ModelInvoices;
use App\Models\ModelSubPlans;
use App\Models\ModelMeetings;
use App\Models\ModelMeetingDetails;


use Session;
use Illuminate\Support\Facades\DB;
use Hash;
use Mail;

class UsersRepositories implements UsersRepositoriesInterface
{

    public function registerUser($data)
    {
        $saveUser = new ModelUsers;
        $saveUser->name = $data['name'];
        $saveUser->email = $data['email'];
        $saveUser->password = Hash::make($data['password']);
       // $saveUser->address = $data['address'];
        $saveUser->phone = $data['phone'];
        $saveUser->role = $data['role'];
        $saveUser->status = $data['status'];
        $saveUser->save();
        if ($saveUser->id != "")
            return "done";
        return null;
    }

    public function checkUserExists($data)
    {
        $data1 = [];
        $databaseUserValidation = ModelUsers::withTrashed()->where([
            ['email', $data['email']]
        ])->where("user_type", 2)->first();
        if (!$databaseUserValidation || !Hash::check($data['password'], $databaseUserValidation->password))
            return 'Invalid Username and password';
        else {
            $data[0] = $databaseUserValidation->toArray();
            return $data;
        }
    }

    public function checkUserExistsAdmin($username, $password, $userType = [1])
    {

        $databaseUserValidation = ModelUsers::withTrashed()->where([
            ['email', $username]
        ])->whereIn("user_type", $userType)->first();
        if (!$databaseUserValidation || !Hash::check($password, $databaseUserValidation->password)) {

            return 'Invalid Username and password';
        } else {

            $data[0] = $databaseUserValidation->toArray();
            return $data;
        }
    }

    public function saveUserPlan($data)
    {

        DB::beginTransaction();
        $invoiceData = $this->generateInvoice($data['invoiceData']);
        $invoiceId = $invoiceData['invoice_id'];
        if (empty($invoiceId))
            DB::rollback();
        else {
            //$customerID = $data['customer_id'];
            $savePaidUser = new ModelPaidUsers;
            $savePaidUser->user_id = $data['user_id'];
            $savePaidUser->plan_id = $data['invoiceData']['plan_id'];
            $savePaidUser->s_plan_id = $data['invoiceData']['s_plan_id'];
            $savePaidUser->sub_id = $data['sub_id'];
            $savePaidUser->customer_id = $data['customer_id'];
            $savePaidUser->subscribed_date = date("Y-m-d h:i:s", $data['userSubscribedDate']);
            $savePaidUser->invoice_id = $invoiceId;
            $savePaidUser->save();
            if (!empty($savePaidUser)) {
                DB::commit();
                return $invoiceData;
            }
        }
        return null;
    }

    public function generateInvoice($invoiceData)
    {
        $invoice = new ModelInvoices();

        // Set the properties from the array data
        $invoice->user_id = $invoiceData['user_id'];
        $invoice->plan_id = $invoiceData['plan_id'];
        $invoice->s_plan_id = $invoiceData['s_plan_id'];
        $invoice->invoice_plan = $invoiceData['invoice_plan'];
        $invoice->invoice_package = $invoiceData['invoice_package'];
        $invoice->invoice_amount = $invoiceData['invoice_amount'];
        $invoice->invoice_currency = $invoiceData['invoice_currency'];
        $invoice->invoice_desc = $invoiceData['invoice_desc'];

        // Save the invoice to the database
        $invoice->save();
        if (empty($invoice->invoice_id))
            return null;
        $dataToReturn['invoice_id'] = $invoice->invoice_id;
        $dataToReturn['created_at'] = $invoice->created_at;
        return $dataToReturn;
    }

    function fetchAllPlansOfUser($userId)
    {
        $data = ModelCompanies::where('user_id', $userId)->with("getPaymentDetail")->get()->keyBy('c_id')->toArray();
        if (empty($data))
            return null;
        foreach ($data as $key => $value) {
            if (isset($value['get_payment_detail']))
                $ids[$key] = $value['get_payment_detail']['sub_id'];
            else
                $ids[$key] = null;
        }
        foreach ($ids as $key => $value)
            $accounts[$key] = $this->checkAccountType($value);
        foreach ($data as $key => $value) {
            if (isset($accounts[$key]))
                $data[$key]['accountType'] = $accounts[$key];
        }


        return $data;
    }

    public function checkAccountType($stripeSubKey)
    {
        $accountType = "Free";
        if (empty($stripeSubKey))
            return "free";
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $stripeCHeck = $stripe->subscriptions->retrieve(
            $stripeSubKey,
        );
        $currentTime = time();
        $expiryTime = $stripeCHeck['current_period_end'];
        if ($currentTime < $expiryTime)
            $check = 1;
        else
            $check = 2;
        if ($check == 1)
            $accountType = "paid";
        else if ($check == 2)
            $accountType == "Expired";
        else
            $accountType = "Free";
        return $accountType;
    }

    function fetchIndividualCompany($companyId)
    {
        $data = ModelCompanies::where('c_id', $companyId)->get()->toArray();
        return (empty($data)) ? null : $data;
    }

    function updateCompanyInformation($data)
    {
        $updateArray = array(
            'c_name' => $data['c_name'],
            'c_email' => $data['c_email'],
            'status' => $data['c_status'],
        );
        $update = ModelCompanies::where("c_id", $data['companyId'])->update($updateArray);
        return ($update) ? $update : null;
    }

    function checkCompanyData($companyId)
    {

        $checkCompany = ModelCompanies::where("c_id", $companyId)->where("status", 1)->with("getPlanDetail")->first();
        if (empty($checkCompany))
            return null;
        $checkCompany = $checkCompany->toArray();
        if (!isset($checkCompany['get_plan_detail'][0]))
            return "free";
        $subId = $checkCompany['get_plan_detail'][0]['sub_id'];
        $checkStatus = $this->checkAccountType($subId);
        return $checkStatus;
    }

    function fetchCompanyData($companyId)
    {
        $checkCompany = ModelCompanies::where("c_id", $companyId)->first();
        return empty($checkCompany) ? null : $checkCompany->toArray();
    }
    function fetchAllPlans()
    {
        $fetchData = ModelPlans::with("getSubPlans")->get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    function fetchPlanDetailByPlanId($planId)
    {
        if (empty($planId))
            return null;
        $fetchData = ModelPlans::where("plan_id", $planId)->with("getSubPlans")->get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    function verifyUserPlan($userId)
    {
        session()->forget('planId');
        session()->forget('packageType');
        session()->forget('planStatus');
        session()->forget('expiryDate');
        session()->forget('planStatus');

        if (empty($userId)) {
            session()->put([
                'accountType' => 'free',
                'planId' => null
            ]);


            return;
        }
        session()->forget('accountType');

        $checkUser = ModelPaidUsers::where('user_id', $userId)->get()->toArray();;
        if (empty($checkUser)) {
            $check = 0;
        } else {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $stripeCHeck = $stripe->subscriptions->retrieve(
                $checkUser[0]['sub_id'],
            );
            $currentTime = time();
            $expiryTime = $stripeCHeck['current_period_end'];
            if ($currentTime < $expiryTime)
                $check = 1;
            else
                $check = 2;
        }
        if ($check == 1) {
            $planStripeId = $stripeCHeck['items']['data'][0]['plan']['id'];
            $planDetails = ModelSubPlans::where("sp_stripe_product_id", $planStripeId)->with("getParentPlan")->get()->toArray();

            if (empty($planDetails)) {
                return session()->put([
                    'accountType' => 'free',
                    'planId' => null
                ]);
            }
            $planId = $planDetails[0]['plan_id'];
            $packageType = $planDetails[0]['sp_name'];
            $packageType = ($packageType == "Month") ? "Monthly" : "Yearly";
            session()->put([
                'accountType' => 'paid',
                'planId' => $planId,
                'planName' => $planDetails[0]['get_parent_plan']['plan_name'],
                'packageType' => $packageType,
                'expiryDate' => $checkUser[0]['expiry_date'],
                'planStatus' => $checkUser[0]['status']
            ]);
        } else if ($check == 2) {
            session()->put([
                'accountType' => 'expired',
                'planId' => null,

            ]);
        } else {
            session()->put([
                'accountType' => 'free',
                'planId' => null
            ]);
        }
        return;
    }

    function fetchCompanyByUserId($userId)
    {
        $fetchData = ModelCompanies::where('user_id', $userId)->get()->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    function fetchCompanyByCompanyId($companyId)
    {
        $fetchData = ModelCompanies::where('c_id', $companyId)->get()->toArray();
        return empty($fetchData) ? null : $fetchData[0];
    }

    function SaveCompanyData($data)
    {
        $saveData = new ModelCompanies();
        $saveData->c_name = $data['c_name'];
        $saveData->c_email = $data['c_email'];
        $saveData->user_id = session()->get('userId');
        $saveData->status = 1;
        $saveData->save();
        return empty($saveData->c_id) ? null : "done";
    }

    function removeCompanyInformation($data)
    {
        $delete = ModelCompanies::where('c_id', $data['id'])->delete();
        return $delete;
    }

    function updateUserProfile($data)
    {
        $updateArray = array(
            'name' => $data['name'],
            'email' => $data['email'],

        );
        if (!empty($data['password'])) {
            $updateArray['password'] = Hash::make($data['password']);
        }
        $update = ModelUsers::where("id", session()->get("userId"))->update($updateArray);
        return ($update) ? $update : null;
    }

    function fetchPaidPlan($userId)
    {
        $checkUser = ModelPaidUsers::where('user_id', $userId)->get()->toArray();
        return empty($checkUser) ? null : $checkUser;
    }

    function updatePackageStatus($canceledTime, $lastDate, $status)
    {
        $updateArray = array(
            'expiry_date' => date('Y-m-d H:i:s', $lastDate),
            'status' => 1,
        );
        $update = ModelPaidUsers::where("user_id", session()->get("userId"))->update($updateArray);
        return ($update) ? $update : null;
    }
    function fetchInvoicesByUserId($userId)
    {
        $invoices = ModelInvoices::where("user_id", $userId)->get()->ToArray();
        return empty($invoices) ? null : $invoices;
    }

    function fetchInvoicesByInvoiceId($invoiceId)
    {
        $invoices = ModelInvoices::where("invoice_id", $invoiceId)->first()->ToArray();
        return empty($invoices) ? null : $invoices;
    }

    function viewAllCompanies()
    {
        $fetchData = ModelCompanies::with("getPlanDetail")->with("getUserDetail")->get()->keyBy("c_id")->toArray();
        return empty($fetchData) ? null : $fetchData;
    }

    function updateCompanyDataByAdmin($data)
    {
        $updateArray = array(
            'c_name' => $data['c_name'],
            'c_email' => $data['c_email'],
            'status' => $data['status']
        );
        $update = ModelCompanies::where("c_id", $data['c_id'])->update($updateArray);
        return ($update) ? $update : null;
    }
    function deleteCompanyByAdminByCompanyId($companyId)
    {
        $deleteArray = ModelCompanies::where('c_id', $companyId)->delete();
        return ($deleteArray) ? $deleteArray : null;
    }

    function fetchAllInvoicesByAdmin()
    {
        $fetchData = ModelInvoices::with("getPurchasersDetail")->get()->toArray();
        return ($fetchData) ? $fetchData : null;
    }

    function addMeetingRequestFromUser($data)
    {


        DB::beginTransaction();
        $meetingId = $this->createMeetingByUser($data);
        if (empty($meetingId)) {
            DB::rollback();
            return null;
        } else {
            $saveData = new ModelMeetingDetails;
            $saveData->m_id = $meetingId;
            $saveData->date = date("Y-m-d H:i:s", strtotime($data['date'] . " " . $data['time'] . ":00"));
            $saveData->user_approval = 1;
            $saveData->admin_approval = 0;
            $saveData->user_id = session()->get('userId');
            $saveData->message = $data['message'];
            $saveData->save();



            if (!empty($saveData)) {
                DB::commit();
                return $meetingId;
            }
        }
        return null;
    }

    function createMeetingByUser($data)
    {
        $saveData = new ModelMeetings;
        $saveData->user_id = session()->get('userId');
        $saveData->status = 1;
        $saveData->name = $data['name'];
        $saveData->email = $data['email'];
        $saveData->phone_no = $data['phone_no'];
        $saveData->save();
        if (!empty($saveData)) {
            return $saveData->m_id;
        } else
            return null;
    }

    function fetchMeetingRequest($meetingId)
    {
        $fetchData = ModelMeetings::where("m_id", $meetingId)
            ->with([
                'fetchMeetingDetails' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'fetchMeetingDetails.fetchUserDetails'
            ])->with('fetchUserDetails')
            ->get()
            ->toArray();
        return $fetchData ?: null;
    }

    function fetchAllMeetingByUserId($userId)
    {
        $fetchData = ModelMeetings::where("user_id", $userId)
            ->with([
                'fetchMeetingDetails' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'fetchMeetingDetails.fetchUserDetails'
            ])
            ->orderBy("created_at", "desc")->get()
            ->toArray();

        return $fetchData ?: null;
    }

    function CheckAlreadyOpenTicketByUserId($userId)
    {
        $fetchData = ModelMeetings::where("user_id", $userId)->where("status", 1)->get()->toArray();
        return empty($fetchData) ? true : false;
    }

    function countOpenMeetings()
    {
        $fetchData = ModelMeetings::where("status", 1)->count();
        return $fetchData;
    }
    function fetchActiveMeetings()
    {
        $fetchData = ModelMeetings::with("fetchUserDetails")->orderBy("created_at", "desc")->get()->toArray();
        return ($fetchData) ? $fetchData : null;
    }

    function acceptmeetingRequest($data)
    {
        $updateArray = array(
            $data['type'] => 1,
        );
        $update = ModelMeetingDetails::where("md_id", $data['id'])->update($updateArray);
        return ($update) ? $update : null;
    }

    function rejectingPreviousAndProcessingNewMeetingRequest($data)
    {

        $updateArray = array(
            'admin_approval' => 2,
            'user_approval' => 2,
        );
        $update = ModelMeetingDetails::where("md_id", $data['id'])->update($updateArray);
        $message = isset($data['message']) ? $data['message'] : '';
        $saveData = new ModelMeetingDetails;
        $saveData->m_id = $data['m_id'];
        $saveData->date = date("Y-m-d H:i:s", strtotime($data['date'] . " " . $data['time'] . ":00"));
        ($data['type'] == 'user_approval') ?  $saveData->user_approval = 1 : $saveData->user_approval = 0;
        ($data['type'] == 'admin_approval') ?  $saveData->admin_approval = 1 : $saveData->admin_approval = 0;
        $saveData->user_id = session()->get('userId');
        $saveData->message = $message;
        $saveData->save();
        return (!empty($saveData)) ? $data['m_id'] : null;
    }

    function fetchMeetingRequestDetailByMDId($mdId)
    {
        $fetchData = ModelMeetingDetails::where("md_id", $mdId)->first();
        return !empty($fetchData) ? $fetchData->toArray() : null;
    }

    function updateTicketStatus($meetingId)
    {
        $updateArray = array(
            'status' => 0,

        );
        $update = ModelMeetings::where("m_id", $meetingId)->update($updateArray);
        return $update;
    }

    function sendMeetingMail($meetingId, $mailTo)
    {
        $data = $this->fetchMeetingRequest($meetingId);
        if ($mailTo == "Admin") {
            $fetchData = $this->fetchServerAdmin();
            foreach ($fetchData as $value) {
                $emails[] = $value['email'];
            }
        } else {
            $emails[] = $data[0]['fetch_user_details']['email'];
        }
        $data['mailTo'] = $mailTo;
        Mail::to($emails)->send(new \App\Mail\NotifyMeetingEmail($data));
    }

    function sendMeetingLinkMail($meetingId)
    {
        $data = $this->fetchMeetingRequest($meetingId);
        $fetchData = $this->fetchServerAdmin();
        foreach ($fetchData as $value) {
            $emails[] = $value['email'];
        }

        Mail::to($emails)->send(new \App\Mail\askForMeetingLink($data));
        return true;
    }

    function fetchServerAdmin()
    {
        $fetchData = ModelUsers::whereIn("user_type", [0, 1])->get();
        return !empty($fetchData) ? $fetchData->toArray() : null;
    }

    function updateMeetingLink($data)
    {
        $updateArray = array(
            'meeting_link' => $data['meeting_Link'],

        );
        $update = ModelMeetings::where("m_id", $data['m_id'])->update($updateArray);
        return $update;
    }

    function viewAllUsers($login_id)
    {
        $fetchData = ModelUsers::whereNotIn('id',[$login_id])->get()->keyBy("id")->toArray();
        return empty($fetchData) ? null : $fetchData;
    }
}
