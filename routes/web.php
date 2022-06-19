<?php

use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController; */

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome.home');

//prevent authenticated user to back to login back 
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

//default authenticated user home route
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */


Route::get('register-user', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('user.register');
Route::post('register-user', [App\Http\Controllers\Auth\RegisterController::class, 'redirectRegisteredUser']);

//Auth routes for Lecturer
Route::group(['prefix'=>'lecturer', 'middleware'=>['isLecturer','auth', 'PreventBackHistory', 'DownloadFile']], function(){ 
    Route::get('talents-feed', [App\Http\Controllers\LecturerController::class, 'talentsFeed'])->name('lecturer.talents_feed');
    Route::get('lecturer-profile', [App\Http\Controllers\LecturerController::class, 'lecturerProfile'])->name('lecturer.profile');
    Route::get('lecturer-job-tracker', [App\Http\Controllers\LecturerController::class, 'lecturerJobTracker'])->name('lecturer.job.tracker');
    Route::get('list-applied-applicants/{id}', [App\Http\Controllers\LecturerController::class, 'jobListAppliedApplicants']);
    Route::get('list-applied-applicants/view-student-profile/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewStudentProfile']);
    Route::get('list-applied-applicants/lecturer-accept-job-application/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerAcceptJobApplication']);
    Route::get('list-applied-applicants/lecturer-reject-job-application/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerRejectJobApplication']);
    Route::get('lecturer-quota-recruitment-completed/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerQuotaRecruitmentCompleted']);
    Route::get('lecturer-job-completed/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerJobCompleted']);
    Route::get('lecturer-view-hired-applicants/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewHiredApplicants']);
    Route::get('lecturer-completed-hired-applicants/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerCompletedHiredApplicants']);
    Route::get('lecturer-view-rejected-applicants/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewRejectedApplicants']);

    Route::get('lecturer-view-hired-applicants/view-hired-student-profile/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewHiredApplicantsProfile']);
    Route::get('lecturer-completed-hired-applicants/view-completed-student-profile/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewCompletedHiredApplicantsProfile']);
    Route::get('lecturer-view-rejected-applicants/view-rejected-student-profile/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerViewRejectedApplicantsProfile']);

    Route::get('lecturer-completed-hired-applicants/review-rating/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerReviewandRating']);
    Route::post('lecturer-completed-hired-applicants/review-rating/submit-review-rating/{id}', [App\Http\Controllers\LecturerController::class, 'lecturerSubmitReviewandRating']);
    Route::post('lecturer-upload-profile-photo',[App\Http\Controllers\LecturerController::class, 'lecturerUploadProfilePhoto'])
    ->name('lecturer.store.upload.photo');
    Route::get('list-applied-applicants/lecturer-download-resume/{id}',[App\Http\Controllers\LecturerController::class, 'lecturerDownloadResume']);
    Route::get('lecturer-view-hired-applicants/lecturer-download-resume/{id}',[App\Http\Controllers\LecturerController::class, 'lecturerDownloadResume']);
    Route::get('lecturer-completed-hired-applicants/lecturer-download-resume/{id}',[App\Http\Controllers\LecturerController::class, 'lecturerDownloadResume']);
    Route::get('lecturer-view-rejected-applicants/lecturer-download-resume/{id}',[App\Http\Controllers\LecturerController::class, 'lecturerDownloadResume']);
    /* Route::get('post-job', [App\Http\Controllers\LecturerController::class, 'postJob'])->name('lecturer.post_job');
     */
    /* Route::get('lecturer-personal-info', [App\Http\Controllers\LecturerController::class, 'lecturerPersonalInfo'])->name('lecturer.personal.info');
    Route::post('lecturer-personal-info', [App\Http\Controllers\LecturerController::class, 'lecturerRegisterPersonalInfo'])->name('lecturer.register.personal.info');
    Route::get('lecturer-professional-info', [App\Http\Controllers\LecturerController::class, 'lecturerProfessionalInfo'])->name('lecturer.professional.info');
    Route::post('lecturer-professional-info', [App\Http\Controllers\LecturerController::class, 'lecturerRegisterProfessionalInfo'])->name('lecturer.register.professional.info');
 */
    //Lecturer Livewire for Registration Completion
    Route::get('lecturer-profile-completion', function () {
        return view('livewire_layouts.lecturer-profile-completion-main-layout');
    })->name('lecturer.profile.completion');

    Route::get('post-job', function () {
        return view('lecturer.lecturer_post_job');
    })->name('lecturer.post_job');
    Route::post('post-job', [App\Http\Controllers\LecturerController::class, 'lecturerPostJob'])->name('lecturer.submit.post.job');
    

    
});

//Auth routes for Student
Route::group(['prefix'=>'student', 'middleware'=>['isStudent','auth', 'PreventBackHistory', 'DownloadFile']], function(){
    Route::get('find-jobs', [App\Http\Controllers\StudentController::class, 'findJobs'])->name('student.find_jobs');
    Route::get('student-profile', [App\Http\Controllers\StudentController::class, 'studentProfile'])->name('student.profile');
    Route::get('student-job-tracker', [App\Http\Controllers\StudentController::class, 'studentJobTracker'])->name('student.job.tracker');
    
    //Student Livewire for Registration Completion
    Route::get('student-profile-completion', function () {
        return view('livewire_layouts.student-profile-completion-main-layout');
    })->name('student.profile.completion');
    
    //Student Resume
    Route::post('student-resume', [App\Http\Controllers\StudentController::class, 'studentResume'])->name('student.resume');

    Route::get('successful-applied-job/{id}', [App\Http\Controllers\StudentController::class, 'successfulAppliedJobs'])/* ->name('student.success.applied.job') */;
    Route::get('accept-job-invitation/{id}', [App\Http\Controllers\StudentController::class, 'studentAcceptJobInvitation']);
    Route::get('reject-job-invitation/{id}', [App\Http\Controllers\StudentController::class, 'studentRejectJobInvitation']);
    Route::post('student-upload-profile-photo',[App\Http\Controllers\StudentController::class, 'studentUploadProfilePhoto'])
    ->name('student.store.upload.photo');
    Route::get('student-download-resume/{id}',[App\Http\Controllers\StudentController::class, 'studentDownloadResume']);
    Route::get('delete-resume/{id}',[App\Http\Controllers\StudentController::class, 'studentDeleteResume']);
    Route::get('student-withdraw-job-application/{id}',[App\Http\Controllers\StudentController::class, 'studentWithdrawJobApplication']);
    Route::get('student-view-lecturer-profile/{id}',[App\Http\Controllers\StudentController::class, 'studentViewLecturerProfile']);
    /* Route::get('student-personal-info', [App\Http\Controllers\StudentController::class, 'studentPersonalInfo'])->name('student.personal.info');
    Route::post('student-personal-info', [App\Http\Controllers\StudentController::class, 'studentRegisterPersonalInfo'])->name('student.register.personal.info');
    Route::get('student-professional-info', [App\Http\Controllers\StudentController::class, 'studentProfessionalInfo'])->name('student.professional.info');
    Route::post('student-professional-info', [App\Http\Controllers\StudentController::class, 'studentRegisterProfessionalInfo'])->name('student.register.professional.info');
    */
    
    
});


