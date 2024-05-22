<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeetingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [LoginController::class,'index']);

Route::get('/essence', [QuestionnaireController::class, 'essence'])->name('plan.essence');
Route::get('/growth', [QuestionnaireController::class, 'growth'])->name('plan.growth');
Route::get('/flourish', [QuestionnaireController::class, 'flourish'])->name('plan.flourish');


Route::get('/user-load-plan', [QuestionnaireController::class, 'userLoadPlan'])->name('user.load.plan');
Route::get('/user-check-plan-login', [QuestionnaireController::class, 'userCheckPlanLogin'])->name('user.check.plan.login');

Route::get('/login-page', [LoginController::class, 'index'])->name('user.login');
Route::post('/login-page', [LoginController::class, 'login'])->name('user.login.check');
Route::get('/user-register', [LoginController::class, 'register'])->name('user.register');
Route::post('/user-register', [LoginController::class, 'saveRegister'])->name('user.save-register');
Route::get("questionnaire/{id}", [QuestionnaireController::class, 'viewQuestionnaire'])->name('view.questionnaire');
Route::POST("submit-questionnaire", [QuestionnaireController::class, 'submitQuestionaire'])->name('submit.questionaire.ajax');
Route::get("questionnaire-notification", [QuestionnaireController::class, 'notifyQuestionaire'])->name('notify.questionnaire');



Route::group(['middleware' => ['UserAuth','PaidUserAuth']], function () {
    Route::get('/proceed-with-plan/{id}', [QuestionnaireController::class, 'proceedWithPlan'])->name('user.proceed-with-plan');
    Route::post('/proceed-with-plan', [QuestionnaireController::class, 'saveProceededPlan'])->name('user.save-proceed-with-plan');
    Route::get('/user-plan-detail', [QuestionnaireController::class, 'UserPlans'])->name('user.plan-details');
    Route::get('/user-plan-detail-ajax', [QuestionnaireController::class, 'UserPlansAjax'])->name('user-plans-details.ajax');
    Route::get('/edit-user-company-modal', [QuestionnaireController::class, 'editUserCompanyModal'])->name('users.edit-user-company-modal.ajax');
    Route::post('/edit-user-company-modal', [QuestionnaireController::class, 'updateUserCompanyModal'])->name('users.update-company-modal.ajax');
    Route::get('/delete-user-company', [QuestionnaireController::class, 'deleteUserCompany'])->name('users.delete-company.ajax');


    Route::get('/purchase-plan', [QuestionnaireController::class, 'purchasePlan'])->name('user.purchase-plan');
    Route::get('/save-purchase-plan', [QuestionnaireController::class, 'savePlan'])->name('user.save.proceed-plan');
    

    // Route::group(['middleware' => ['PaidUserAuth']], function () {
        //Purchase Plan then Redirect to Dashboard
        Route::get('/dashboard', [QuestionnaireController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/dashboard/settings', [QuestionnaireController::class, 'dashboardSettings'])->name('user.dashboard.settings');
        Route::get('/questionaire/create', [QuestionnaireController::class, 'createQuestionaireAPI'])->name('users.create-questionaire.ajax');
        Route::POST('/questionaire/create', [QuestionnaireController::class, 'saveQuestionaireAPI'])->name('users.save-questionaire.ajax');
        Route::post("/update-user-profile",[LoginController::class, 'updateProfile'])->name('user.update-profile');
        Route::get('/user-unsub-package', [LoginController::class, 'userUnsubPackage'])->name('user-unsub-package');
        Route::get('/purchase-history', [QuestionnaireController::class, 'purchaseHistory'])->name('user.dashboard.purchase-history');
        Route::get('/purchase-history/invoice/{id}', [QuestionnaireController::class, 'viewInvoice'])->name('user.dashboard.purchase-history.view-invoice');
        Route::get('/purchase-history/download-invoice/{id}', [QuestionnaireController::class, 'downloadInvoice'])->name('user.dashboard.purchase-history.download-invoice');
    // });
    //meeting
    Route::get('/create-meeting-request', [MeetingController::class, 'createRequest'])->name('create-meeting-request-modal');
    Route::post('/create-meeting-request', [MeetingController::class, 'saveRequest'])->name('save-meeting-request');
    Route::get('view-meeting/{meetingId}', [MeetingController::class,"viewMeeting"])->name("user.view.meeting");
    Route::get('/accept-meeting-request', [MeetingController::class, 'acceptMeetingRequest'])->name('accept-meeting-request.ajax');
    Route::get('/reject-meeting-request', [MeetingController::class, 'rejectMeetingRequest'])->name('reject-meeting-request.ajax');
    Route::post('update-meeting-request-form-ajax', [MeetingController::class, 'rejectMeetingRequest2'])->name('user.update-meeting-request-form-ajax');
    Route::get('/user-ask-for-meeting-link', [MeetingController::class, 'askMeetingLink'])->name('user.ask-for-meeting-link');
    
    
    

    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');

});


