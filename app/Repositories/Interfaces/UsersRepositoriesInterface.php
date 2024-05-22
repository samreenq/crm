<?php
namespace App\Repositories\Interfaces;

Interface UsersRepositoriesInterface{

   public function registerUser($data);
   public function checkUserExists($data);
   public function checkUserExistsAdmin($username,$password,$userType);
   public function saveUserPlan($data);
   function fetchAllPlansOfUser($userId);
   function checkAccountType($stripeSubKey);
   function fetchIndividualCompany($companyId);
   function updateCompanyInformation($data);
   function checkCompanyData($companyId);
   function fetchCompanyData($companyId);
   function fetchAllPlans();
   function fetchPlanDetailByPlanId($planId);
   function verifyUserPlan($userId);
   function fetchCompanyByUserId($userId);
   function SaveCompanyData($data);
   function removeCompanyInformation($data);
   function updateUserProfile($data);
   function fetchPaidPlan($userId);
   function updatePackageStatus($canceledTime,$lastDate,$status);
   function fetchInvoicesByUserId($userId);
   function fetchInvoicesByInvoiceId($invoiceId);
   function viewAllCompanies();
   function fetchCompanyByCompanyId($companyId);
   function updateCompanyDataByAdmin($data);
   function deleteCompanyByAdminByCompanyId($companyId);
   function fetchAllInvoicesByAdmin();
   function addMeetingRequestFromUser($data);

   function fetchMeetingRequest($meetingId);
   function fetchAllMeetingByUserId($userId);
   function CheckAlreadyOpenTicketByUserId($userId);
   function countOpenMeetings();
   function fetchActiveMeetings();
   function acceptmeetingRequest($data);
   function rejectingPreviousAndProcessingNewMeetingRequest($data);

   function fetchMeetingRequestDetailByMDId($mdId);
   function updateTicketStatus($meetingId);
   function sendMeetingMail($meetingId,$userId);
   function updateMeetingLink($data);
   function sendMeetingLinkMail($meetingId);
   function viewAllUsers($login_id);




}

?>
