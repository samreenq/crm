<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\User\UserController as UserUserController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Login
Route::get("/",[AdminController::class,'index']);
Route::post("/login",[AdminController::class,'validateLogin'])->name('admin.login.validate');

//logout
Route::get("/logout",[AdminController::class,'logout'])->name('admin.logout');



Route::group(['middleware'=>['AdminAuth']],function(){
    Route::get('homepage', [AdminController::class,'homepage'])->name('admin.homepage');
    Route::get('companies', [AdminController::class,'viewCompanies'])->name('admin.companies');
    Route::get('manage-companies/ajax', [AdminController::class,'manageCompanies'])->name('admin.manage-companies.ajax');
    Route::get('manage-companies/edit-by-admin', [AdminController::class,'editCompanyByAdmin'])->name('admin.manage-company.edit-modal.ajax');
    Route::post('manage-companies/edit-by-admin', [AdminController::class,'updateCompanyByAdmin'])->name('admin.manage-company.update-modal.ajax');
    Route::get('manage-companies/delete-by-admin', [AdminController::class,'deleteCompanyByAdmin'])->name('admin.delete-company-admin.ajax');
    Route::get('invoices', [AdminController::class,'viewInvoices'])->name('admin.invoices');
    Route::get('count-meeting-ajax', [AdminController::class,'countOpenMeetings'])->name('admin.count-meeting.ajax');
    Route::get('view-meetings', [AdminController::class,'viewMeetings'])->name('admin.view.meetings');
    Route::get('view-meetings-ajax', [AdminController::class,'viewActiveMeetingsAjax'])->name('admin.view.meetings-ajax');
    Route::get('view-meeting/{meetingId}', [AdminController::class,'viewSpecificMeeting'])->name('admin.view.meeting');
    Route::get('accept-meeting-request', [AdminController::class,'adminAcceptingMeeting'])->name('admin.accept-meeting-request.ajax');
    Route::get('reject-meeting-request', [AdminController::class,'adminRejectingMeeting'])->name('admin.reject-meeting-request.ajax');
    Route::post('update-meeting-request-form-ajax', [AdminController::class,'adminRejectingMeeting2'])->name('update-meeting-request-form-ajax');
    Route::post('update-meeting-link', [AdminController::class,'updateMeetingLink'])->name('updateMeetingLink');

  // Users
  Route::get('users', [UserController::class,'list'])->name('admin.users');
  Route::get('manage-users/ajax', [UserController::class,'listUsers'])->name('admin.manage-users.ajax');
  Route::get('users/add', [UserController::class,'add'])->name('admin.users.add');
  Route::post('users/store', [UserController::class,'store'])->name('admin.users.store');


  //Organization
  Route::get('organization', [OrganizationController::class,'list'])->name('admin.organization');
  Route::get('manage-organization/ajax', [OrganizationController::class,'listAjax'])->name('admin.manage-organization.ajax');
  Route::get('organization/add', [OrganizationController::class,'add'])->name('admin.organization.add');
  Route::post('organization/store', [OrganizationController::class,'store'])->name('admin.organization.store');


  //Contacts
  Route::get('contacts', [ContactController::class,'index'])->name('admin.contacts');
  Route::get('manage-contacts/ajax', [ContactController::class,'listAjax'])->name('admin.manage-contacts.ajax');
  Route::get('contacts/add', [ContactController::class,'create'])->name('admin.contacts.add');
  Route::post('contacts/store', [ContactController::class,'store'])->name('admin.contacts.store');
  Route::post('contacts/getstates', [ContactController::class,'fetchState'])->name('admin.contacts.getstates');

  //Leads
  Route::get('leads', [LeadController::class,'index'])->name('admin.leads');
  Route::get('manage-leads/ajax', [LeadController::class,'listAjax'])->name('admin.manage-leads.ajax');
  Route::get('leads/add', [LeadController::class,'create'])->name('admin.leads.add');
  Route::post('leads/store', [LeadController::class,'store'])->name('admin.leads.store');

});

