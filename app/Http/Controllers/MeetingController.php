<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UsersRepositoriesInterface;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    private $usersRepository;
    public function __construct(UsersRepositoriesInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function createRequest()
    {
        $check = $this->usersRepository->CheckAlreadyOpenTicketByUserId(session()->get("userId"));

        if (!$check) {
            return $this->code300("You have already an Open Ticket, You cannot create another");
        }
        return view("web.meetings.ajax.create_request")->render();
    }

    public function saveRequest(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'date' => 'required',
                'time' => 'required',
            ],
            [
                'name.required' => 'Please define your Name.',
                'email.required' => 'Please define your Email.',
                'phone_no.required' => 'Please define your Contact Number.',
                'date.required' => 'Please select your desired date for the meeting. ',
                'time.required' => 'Please select your desired timing for the meeting. ',
            ]
        );
        if ($validator->fails()) {
            return $this->Code302($validator->errors()->all());
        } else {
            $previousUrl = url()->previous();
            $data = $request->all();
            $saveData = $this->usersRepository->addMeetingRequestFromUser($data);
            if (!empty($saveData)) {
                $fetchMeeting = $this->usersRepository->fetchMeetingRequest($saveData);
                $sendMail = $this->usersRepository->sendMeetingMail($saveData, "Admin");
                // Mail::to($companyData['c_email'])->send(new \App\Mail\MeetingEmailToAdmin($fetchMeeting));
                $this->jsonMessage2("Your Request has been processed, Admin has been notified", "success");
                return $this->Code200("You have sucessfully removed the Company", 'Delete Company');
            } else {
                $this->jsonMessage2("Something went wrong, Please try again!", "error");
                return $this->code300("Something went wrong, Please try again!");
            }

        }
    }

    function viewMeeting($id)
    {
        $id = checkParamUrl($id, "/dashboard");
        $data = $this->usersRepository->fetchMeetingRequest($id);
        // cD($data);
        $pageTitle = "REQUEST000" . $data[0]['m_id'];
        return view("web.meetings.view_meeting", compact("data", "pageTitle"));
    }

    function acceptMeetingRequest(Request $request)
    {
        $data = $request->all();
        $processRequest = $this->usersRepository->acceptmeetingRequest($data);
        $meetingDetail = $this->usersRepository->fetchMeetingRequestDetailByMDId($data['id']);
        if (!empty($meetingDetail))
            $data['m_id'] = $meetingDetail['m_id'];
        if ($processRequest) {

            $updateTicketStatus = $this->usersRepository->updateTicketStatus($data['m_id']);
            $sendMail = $this->usersRepository->sendMeetingMail($data['m_id'], "Admin");
            $previousUrl = route('user.view.meeting', ['meetingId' => urlParam($data['m_id'])]);
            $this->jsonMessage2("Your Request has been processed, Admin has been notified", "success");
            return $this->Code200("You have sucessfully removed the Company", 'Delete Company', $previousUrl);
        } else {
            $this->jsonMessage2("Something went wrong, Please try again!", "error");
            return $this->code300("Something went wrong, Please try again!");
        }
    }

    function rejectMeetingRequest(Request $request)
    {
        $data = $request->all();
        return view("web.meetings.ajax.update_request", compact("data"))->render();
    }

    function rejectMeetingRequest2(Request $request)
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
            $data = $request->all();
            $meetingDetail = $this->usersRepository->fetchMeetingRequestDetailByMDId($data['id']);
            if (!empty($meetingDetail))
                $data['m_id'] = $meetingDetail['m_id'];
            $processRequest = $this->usersRepository->rejectingPreviousAndProcessingNewMeetingRequest($data);
            if (!empty($processRequest)) {
                $sendMail = $this->usersRepository->sendMeetingMail($data['m_id'], "Admin");
                $previousUrl = route('user.view.meeting', ['meetingId' => urlParam($data['m_id'])]);
                $this->jsonMessage2("Your Request has been processed, Admin has been notified", "success");
                return $this->Code200("", '', $previousUrl);
            } else {
                $this->jsonMessage2("Something went wrong, Please try again!", "error");
                return $this->code300("Something went wrong, Please try again!");
            }
        }
    }

    function askMeetingLink(Request $request)
    {
        $data = $request->all();
        $processRequest = $this->usersRepository->sendMeetingLinkMail($data);
        if ($processRequest) {
            $previousUrl = route('user.view.meeting', ['meetingId' => urlParam($data['id'])]);
            $this->jsonMessage2("Your Request has been processed, Admin has been notified", "success");
            return $this->Code200("", '', $previousUrl);
        } else {
            $this->jsonMessage2("Something went wrong, Please try again!", "error");
            return $this->code300("Something went wrong, Please try again!");
        }
    }


}
