<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LecturerProfile;
use App\Models\LecturerPostJob;
use App\Models\ReviewRating;
use App\Models\StudentLanguage;
use App\Models\StudentProfile;
use App\Models\StudentSkill;
use App\Models\User;
use App\Models\lecturerAcademicQualification;
use Illuminate\Support\Facades\DB;
use App\Models\StudentOtherEducation;
use App\Models\StudentCertificate;
use App\Models\StudentExperience;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\putFileAs;
use Carbon\Carbon;
use App\Models\StudentResume;
use Illuminate\Support\Facades\Response;


class LecturerController extends Controller
{
    
    function talentsFeed(){
        $list_talents = StudentProfile::all();
        $list_language = StudentLanguage::all();
        $list_skills = StudentSkill::all();
        $list_users = User::get()->first();  /* @::all(); */

        return view('lecturer.lecturer_talents_feed', compact('list_talents', 'list_language', 'list_skills', 'list_users'));
    }
    function postJob(){
        return view('lecturer.lecturer_post_job');
    }

    function lecturerProfile(){
        $profile_details = LecturerProfile::where('user_id', '=', Auth::id())->first();
        $profile = User::find(Auth::id());
        $lecturer_academic = LecturerAcademicQualification::where('user_id', '=', Auth::id())->get();

        return view('lecturer.lecturer_profile', compact('profile_details', 'profile', 'lecturer_academic'));
    }
    
    function lecturerPersonalInfo(){
        return view('lecturer.lecturer_register_personal_1');
    }
    function lecturerProfessionalInfo(){
        return view('lecturer.lecturer_register_professional_2');
    }

    /* insert into lecturer_profiles table (create new row) */
    function lecturerRegisterPersonalInfo(Request $request){
        /* $request->validate([    ]); */
        
        //create new row in LecturerProfile model
        $personalInfo = new LecturerProfile;
        $personalInfo->user_id = Auth::id();
        $personalInfo->full_name = $request->full_name;
        /* $personalInfo->profile_picture = $request->profile_picture; */
        /* $personalInfo->profile_status = $request->profile_status; */
        $personalInfo->description = $request->description;
        $personalInfo->gender = $request->gender;
        $personalInfo->DOB = $request->DOB;
        $personalInfo->age = $request->age;
        $personalInfo->phone = $request->phone;
        $personalInfo->save();
 
        return redirect()->route('lecturer.professional.info');
    }

    function lecturerRegisterProfessionalInfo(Request $request){
        /* $request->validate([    ]); */

        LecturerProfile::where('user_id', Auth::id())->update([
            'college_dept'=>$request->college_dept,
            'position'=>$request->position,
            'room_no'=>$request->room_no,
            'office_contact'=>$request->office_contact,
            'ext'=>$request->ext
        ]);

        return redirect()->route('lecturer.profile');
    }

    function lecturerPostJob(Request $request){
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_brief' => 'required|string|max:1000',
            'job_responsibilities' => 'required|string|max:1000',
            'employment_type' => 'required|string|max:255',
            'num_of_recruitment' => 'required|integer|max:255',
            'allowance' => 'required|integer',
            'job_duration' => 'required|integer|max:255',
            'job_duration_type' => 'required|string|max:255',
            'start_date' => 'required|date|max:255',
            'end_date' => 'required|date|max:255',
            'work_location' => 'required|string|max:255',
            'title_research_project' => 'required|string|max:255',
            'research_project_brief' => 'required|string|max:1000',
            'college_dept' => 'required|string|max:255',
        ]);
        
        LecturerPostJob::create([
            'user_id' => Auth::id(), 
            'job_title' => $request->job_title,
            'job_brief' => $request->job_brief,
            'job_responsibilities' => $request->job_responsibilities,
            'job_status'=> '2',
            'num_of_recruitment' => $request->num_of_recruitment,
            'allowance' => $request->allowance,
            'skills_name' => $request->skills_name,
            'job_duration' => $request->job_duration,
            'job_duration_type'=> $request->job_duration_type,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'work_location'=> $request->work_location,
            'language_name' => $request->language_name,
            'language_level' => $request->language_level,
            'title_research_project'=> $request->title_research_project,
            'research_project_brief'=> $request->research_project_brief,
            'college_dept'=> $request->college_dept, 
        ]);
        
        
        return redirect()->route('lecturer.talents_feed')->with('success', 'Your job has been been posted!.');      
    }

    function lecturerJobTracker(){
        $post_job = lecturerPostJob::where('user_id', '=', Auth::id())->get();
        $list_tobehired_job = lecturerPostJob::where('user_id', '=', Auth::id())->where('job_status', '=', '2')->count();
        $list_accepted_job = lecturerPostJob::where('user_id', '=', Auth::id())->where('job_status', '=', '3')->count();
        $list_completed_job = lecturerPostJob::where('user_id', '=', Auth::id())->where('job_status', '=', '4')->count();
        $list_rejected_job = lecturerPostJob::where('user_id', '=', Auth::id())->where('job_status', '=', '5')->count();
    
        return view('lecturer.lecturer_job_tracker', compact('post_job', 'list_tobehired_job', 'list_accepted_job', 'list_completed_job', 'list_rejected_job'));
    }

    function jobListAppliedApplicants($id){
        $list_applicant = lecturerPostJob::find($id);
        $applicant_profile = StudentProfile::all();
        $list_applicant->appliedJobs()->get();

        $attachments = StudentResume::all();

        return view('lecturer.lecturer_view_applied_applicants', compact('list_applicant', 'applicant_profile'));
    }

    function lecturerViewStudentProfile($id){
        $profile_details = StudentProfile::where('user_id', '=', $id)->first();
        $profile = User::find(Auth::id());
        $educations = StudentOtherEducation::where('user_id','=', $id)->get();
        $certificates = StudentCertificate::where('user_id', '=', $id)->get();
        $experiences = StudentExperience::where('user_id', '=', $id)->get();
        $skills = StudentSkill::where('user_id', '=', $id)->get();
        $languages = StudentLanguage::where('user_id', '=', $id)->get();

        $student = User::find($id)->get();
        $lecturers = lecturerProfile::all();

        $review_rating = ReviewRating::where('student_id', '=', $id)->get();
        $jobs = lecturerPostJob::all();

        return view('lecturer.lecturer_view_student_profile', compact('profile_details', 'profile', 'educations', 'certificates', 'experiences', 'skills', 'languages', 'student', 'lecturers', 'jobs', 'review_rating'));
    }

    function lecturerAcceptJobApplication($id){
        $check_num_recruitment = lecturerPostJob::all();
        $x = 0;
            
        /* as we passed $id in which means 'user_id' in pivot, hence we used many_job(). if we passed pivot->lecturer_post_job_id, we used appliedJobs() */
        $accept_applicant = User::find($id);
        $jobs = lecturerPostJob::where('user_id','=', Auth::id())->get();
        $accept_applicant->many_job()->updateExistingPivot($jobs, ['status'=>'3']);  /* change status 2 (hired) to status 3 (ongoing) */
        /* if ($accept_applicant) {
            foreach ($check_num_recruitment as $check){
                $check->num_of_recruitment = $check->num_of_recruitment - 1;
                $x = $x - 1;
                lecturerPostJob::where('id', $accept_applicant->id)->update([
                    'num_of_recruitment'=> $check->num_of_recruitment,
                ]);
            }
        } */

        /* if ($accept_applicant) {
            foreach ($check_num_recruitment as $check){
                if($x == 0)
                lecturerPostJob::where('id', $accept_applicant->id)->update([
                    'job_status'=>'3',
                ]);
                else{
                    lecturerPostJob::where('id', $accept_applicant->id)->update([
                        'job_status'=>'90',
                    ]);
                }
            }
        } */

        return redirect()->back()->with('success','Congratulations! You have finally found the right candidate for your job.');
    }

    function lecturerRejectJobApplication($id){

        /* as we passed $id in which means 'user_id' in pivot, hence we used many_job(). if we passed pivot->lecturer_post_job_id, we used appliedJobs() */
        $accept_applicant = User::find($id);
        $jobs = lecturerPostJob::where('user_id','=', Auth::id())->get();
        $accept_applicant->many_job()->updateExistingPivot($jobs, ['status'=>'5']);  /* change status 2 (hired) to status 5 (rejected) */

        return redirect()->back()->with('rejected','The job application has been turned down.');
    }

    function lecturerQuotaRecruitmentCompleted($id){
        lecturerPostJob::where('id', $id)->update([
            'job_status'=>'3',
        ]);
        
        return redirect()->back();

        /* this time i passed pivot->lecturer_job_post_id and it works! */
        /* $accept_applicant = lecturerPostJob::find($id);
        $accept_applicant->appliedJobs()->get(); 

        if ($accept_applicant) {
            foreach($accept_applicant->appliedJobs as $done){
                lecturerPostJob::where('id', $done->pivot->lecturer_post_job_id)->update([
                    'job_status'=>'3',
                ]);
            }
        } */
    }

    function lecturerJobCompleted($id){
        lecturerPostJob::where('id', $id)->update([
            'job_status'=>'4',
        ]);

        $accept_applicant = lecturerPostJob::find($id);
        $accept_applicant->appliedJobs()->get(); 
        if ($accept_applicant){
            foreach($accept_applicant->appliedJobs as $done){
                $accept_applicant->appliedJobs()->updateExistingPivot($done->pivot->user_id, ['status'=>'4']);
            }
        } 

        return redirect()->back();
    }

    function lecturerViewHiredApplicants($id){
        $list_applicant = lecturerPostJob::find($id);
        $applicant_profile = StudentProfile::all();
        $list_applicant->appliedJobs()->get();

        $attachments = StudentResume::all();

        return view('lecturer.lecturer_view_hired_applicants', compact('list_applicant', 'applicant_profile'));
    }

    function lecturerCompletedHiredApplicants($id){
        $list_applicant = lecturerPostJob::find($id);
        $applicant_profile = StudentProfile::all();
        $list_applicant->appliedJobs()->get();

        $attachments = StudentResume::all();

        return view('lecturer.lecturer_view_completed_applicants', compact('list_applicant', 'applicant_profile'));
    }

    function lecturerViewRejectedApplicants($id){
        $list_applicant = lecturerPostJob::find($id);
        $applicant_profile = StudentProfile::all();
        $list_applicant->appliedJobs()->get();

        $attachments = StudentResume::all();

        return view('lecturer.lecturer_view_rejected_applicants', compact('list_applicant', 'applicant_profile'));
    }

    function lecturerViewHiredApplicantsProfile($id){
        $profile_details = StudentProfile::where('user_id', '=', $id)->first();
        $profile = User::find(Auth::id());
        $educations = StudentOtherEducation::where('user_id','=', $id)->get();
        $certificates = StudentCertificate::where('user_id', '=', $id)->get();
        $experiences = StudentExperience::where('user_id', '=', $id)->get();
        $skills = StudentSkill::where('user_id', '=', $id)->get();
        $languages = StudentLanguage::where('user_id', '=', $id)->get();

        $student = User::find($id)->get();
        $lecturers = lecturerProfile::all();

        $review_rating = ReviewRating::where('student_id', '=', $id)->get();
        $jobs = lecturerPostJob::all();

        return view('lecturer.lecturer_view_student_profile', compact('profile_details', 'profile', 'educations', 'certificates', 'experiences', 'skills', 'languages', 'student', 'lecturers', 'review_rating', 'jobs'));
    }

    function lecturerViewCompletedHiredApplicantsProfile($id){
        $profile_details = StudentProfile::where('user_id', '=', $id)->first();
        $profile = User::find(Auth::id());
        $educations = StudentOtherEducation::where('user_id','=', $id)->get();
        $certificates = StudentCertificate::where('user_id', '=', $id)->get();
        $experiences = StudentExperience::where('user_id', '=', $id)->get();
        $skills = StudentSkill::where('user_id', '=', $id)->get();
        $languages = StudentLanguage::where('user_id', '=', $id)->get();

        $student = User::find($id)->get();
        $lecturers = lecturerProfile::all();

        $review_rating = ReviewRating::where('student_id', '=', $id)->get();
        $jobs = lecturerPostJob::all();

        return view('lecturer.lecturer_view_student_profile', compact('profile_details', 'profile', 'educations', 'certificates', 'experiences', 'skills', 'languages', 'student', 'lecturers', 'review_rating', 'jobs') );
    }

    function lecturerViewRejectedApplicantsProfile($id){
        $profile_details = StudentProfile::where('user_id', '=', $id)->first();
        $profile = User::find(Auth::id());
        $educations = StudentOtherEducation::where('user_id','=', $id)->get();
        $certificates = StudentCertificate::where('user_id', '=', $id)->get();
        $experiences = StudentExperience::where('user_id', '=', $id)->get();
        $skills = StudentSkill::where('user_id', '=', $id)->get();
        $languages = StudentLanguage::where('user_id', '=', $id)->get();

        $student = User::find($id)->get();
        $lecturers = lecturerProfile::all();

        $review_rating = ReviewRating::where('student_id', '=', $id)->get();
        $jobs = lecturerPostJob::all();

        return view('lecturer.lecturer_view_student_profile', compact('profile_details', 'profile', 'educations', 'certificates', 'experiences', 'skills', 'languages', 'student', 'lecturers', 'review_rating', 'jobs'));
    }

    /* function lecturerSubmitReview($id){
        ReviewRating::create([
            'lecturer_id' => Auth::id(), 
            'student_id' => $id,
            'star_rating' => $request->star_rating,
            'review' => $request->review,
        ]);
        return view('lecturer.lecturer_modal_submit_review_rating');
    }

    
 */

    function lecturerReviewandRating($id){
        $list_applicant = User::find($id);
        $applicant_profile = StudentProfile::all();
        $list_applicant->many_job()->get();

        return view('lecturer.lecturer_submit_review_rating', compact('list_applicant', 'applicant_profile'));
    }

    function lecturerSubmitReviewandRating($id, Request $request){
        /* we passed user_id */
        /* $list_applicant = User::find($id);
        $list_applicant->many_job()->get();
        $job_id = lecturerPostJob::all();
        if ($list_applicant){
            foreach($list_applicant->many_job as $done){
                foreach($job_id as $job){
                    if($done->id == $job->id)
                    ReviewRating::create([
                        'lecturer_id' => Auth::id(), 
                        'student_id' => $id,
                        'job_id' => $done->id,
                        'star_rating' => $request->star_rating,
                        'review' => $request->review,
                    ]);
                }
            }
            
        } */ 

        /* we passed lecturer_post_job_id */
        $list_applicant = lecturerPostJob::find($id);
        $list_applicant->appliedJobs()->get();
        $stud_id = User::all();
        if ($list_applicant){
            foreach($list_applicant->appliedJobs as $done){
                foreach($stud_id as $student){
                    if($done->id == $student->id)
                    /* $reviewrating = new ReviewRating;
                    $reviewrating->lecturer_id = Auth::id();
                    $reviewrating->student_id = $done->id;
                    $reviewrating->job_id = $id;
                    $reviewrating->star_rating = $request->star_rating;
                    $reviewrating->review = $request->review;
                    $reviewrating->save(); */

                    ReviewRating::create([
                        'lecturer_id' => Auth::id(), 
                        'student_id' => $done->id,
                        'job_id' => $id,
                        'star_rating' => $request->star_rating,
                        'review' => $request->review,
                    ]);
                }
            }
            
        }
        return redirect()->back()->with('success','Job review has been posted!.');
    }

    function lecturerUploadProfilePhoto(Request $request){
        $validatedData = $request->validate([
            'profile_picture' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $file = $request->file('profile_picture');
        if($request->hasFile('profile_picture')){
            $filename = $file->getClientOriginalName();
            Storage::putFileAs('public/lecturer_profile_photo', $file, $filename);
            LecturerProfile::where('user_id', Auth::id())->update([
                'profile_picture'=>$filename,
            ]);
        }
        
        return redirect()->back()->with('success','Profile photo has been uploaded!');
    }

    /**
         * Update the avatar for the user.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    function lecturerDownloadResume($id){
        $file = StudentResume::where('user_id', $id)->get()->first();
        $pathToFile = public_path('storage/resumes/'.$file->file_name);
        $resume_name = $file->file_name;
        $headers = ['Content-Type: application/zip'];

        return Response::download($pathToFile, $resume_name, $headers);
    }
}

