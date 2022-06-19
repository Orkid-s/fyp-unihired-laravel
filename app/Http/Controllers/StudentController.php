<?php

namespace App\Http\Controllers;

use App\Models\StudentSkill;
use App\Models\Application;
use App\Models\User;
use App\Models\LecturerPostJob;
use App\Models\StudentProfile;
use App\Models\ReviewRating;
use App\Models\LecturerProfile;
use App\Models\StudentOtherEducation;
use App\Models\StudentCertificate;
use App\Models\StudentExperience;
use App\Models\StudentResume;
use App\Models\StudentLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\putFileAs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Models\LecturerAcademicQualification;


class StudentController extends Controller
{
    /* display list of jobs in find jobs page */
    function findJobs(){
        $list_jobs = LecturerPostJob::all();
        $lecturers = LecturerProfile::all();

        return view('student.student_find_jobs', compact('list_jobs', 'lecturers'));
    }

    function studentProfile(){
        $profile_details = StudentProfile::where('user_id', '=', Auth::id())->first();
        $profile = User::find(Auth::id());
        $educations = StudentOtherEducation::where('user_id','=', Auth::id())->get();
        $certificates = StudentCertificate::where('user_id', '=', Auth::id())->get();
        $experiences = StudentExperience::where('user_id', '=', Auth::id())->get();
        $skills = StudentSkill::where('user_id', '=', Auth::id())->get();
        $languages = StudentLanguage::where('user_id', '=', Auth::id())->get();
        $attachments = StudentResume::where('user_id', '=', Auth::id())->get();
        
        $student = User::find(Auth::id())->get();
        $lecturers = lecturerProfile::all();

        $review_rating = ReviewRating::where('student_id', '=', Auth::id())->get();
        $jobs = lecturerPostJob::all();
       

        return view('student.student_profile', compact('profile_details', 'profile', 'educations', 'certificates', 'experiences', 'skills', 'attachments', 'languages', 'lecturers', 'review_rating', 'jobs', 'student'));
    }

    function studentJobTracker(){
        $invited_jobs = User::find(Auth::id());
        $applied_jobs = User::find(Auth::id());
        $ongoing_jobs = User::find(Auth::id());
        $completed_jobs = User::find(Auth::id());
        $rejected_jobs = User::find(Auth::id());

        $list_invited = DB::table('lecturer_post_job_user')->where('status', '1')->where('user_id', Auth::id())->count();
        $list_applied = DB::table('lecturer_post_job_user')->where('status', '2')->where('user_id', Auth::id())->count();
        $list_ongoing = DB::table('lecturer_post_job_user')->where('status', '3')->where('user_id', Auth::id())->count();
        $list_completed = DB::table('lecturer_post_job_user')->where('status', '4')->where('user_id', Auth::id())->count();
        $list_rejected = DB::table('lecturer_post_job_user')->where('status', '5')->where('user_id', Auth::id())->count();
        
        /* $applied_jobs->many_job()->where('status', 'Ongoing')->first()->pivot->status;
        $pivot_entries  = DB::table('lecturer_post_job_user')->where('status', 'Ongoing')->get(); */

        /* $ongoing_jobs->many_job()->where('status', 'Ongoing')->get();
 */
        /* $user_applied->many_job()->sync($user_applied, false); */
        /* $user_applied->many_job()->updateExistingPivot($job_post, ['status'=>'Applied']); */

        return view('student.student_job_tracker', compact('invited_jobs','applied_jobs', 'ongoing_jobs', 'completed_jobs', 'rejected_jobs', 'list_invited', 'list_applied', 'list_ongoing', 'list_completed', 'list_rejected' ));
    }

    /* function studentPersonalInfo(){
        return view('student.student_register_personal_1');
    } */

    /* function studentProfessionalInfo(){
        $skills = StudentSkill::where('user_id', Auth::id())->get();
        return view('student.student_register_professional_2', compact('skills'));
    } */

    function studentRegisterPersonalInfo(Request $request){
        /* $this->validate([    ]); */

        $studentPersonalInfo = new StudentProfile;
        $studentPersonalInfo->user_id = Auth::id();
        $studentPersonalInfo->full_name = $request->full_name;
        /* if($studentPersonalInfo->profile_picture = NULL){
            $studentPersonalInfo->profile_picture = 'img_avatar.png';
        } */
        /* $studentPersonalInfo->profile_status = $request->profile_status; */
        $studentPersonalInfo->description = $request->description;
        $studentPersonalInfo->gender = $request->gender;
        $studentPersonalInfo->DOB = $request->DOB;
        $studentPersonalInfo->age = $request->age;
        $studentPersonalInfo->phone = $request->phone;
        $studentPersonalInfo->town = $request ->town;
        $studentPersonalInfo->city = $request ->city;
        $studentPersonalInfo->ZIP = $request ->ZIP;
        $studentPersonalInfo->state = $request ->state;
        $studentPersonalInfo->country = $request ->country;
        $studentPersonalInfo->save();

        return redirect()->route('student.profile');
    }


    function studentResume(Request $request){
        $validatedData = $request->validate([
            'file_name' => 'mimes:pdf|max:10240000', /*  this is bytes, 10MB*/
        ]);

        $resume = $request->file('file_name');
        if($request->hasFile('file_name') && StudentResume::where('user_id', Auth::id())->get()->isEmpty()){
            //get resume name
    		$resume_name = $resume->getClientOriginalName();
    		Storage::putFileAs('public/resumes', $resume, $resume_name);
    	}
        else{
            return back()
            ->with('error-resume','You have uploaded your resume.');
        }
        $resume = new StudentResume;
    	$resume->file_name = $resume_name;
    	$resume->user_id = Auth::id();
    	$resume->save();

        return back()
            ->with('success-resume','Resume has been uploaded.')
            ->with('file', $resume_name);
    }

    function studentRegisterProfessionalInfo(Request $request){
        $this->validate($request, [
            /* 'stall_name' => 'required|string',
            'stall_address' => 'required|string', */
            'skills.*.name' => 'required|string',
            'skills.*.open' => 'required|string',
            /* 'skills.*.close' => 'required|string', */
        ], [], [
            /* 'stall_name' => 'stall name',
            'stall_address' => 'stall address', */
            'skills.*.name' => 'skill name',
            'skills.*.close' => 'skill close',
            /* 'skills.*.open' => 'skill open', */
        ]);
        DB::beginTransaction();
        try {
            /* $stall = StudentSkill::create([
                'name' => $request->stall_name,
                'address' => $request->stall_address,
            ]); */

            //call setfieldschedules 
            $skills->skills()->createMany($this->setFieldSkills($request));


            return redirect()->route('student.profile');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd("Create failed:" . $th->getMessage());
        } finally {
            DB::commit();
        }
    }

    private function setFieldSchedules(Request $request)
    {
        $skills = [];
        foreach ($request->skills as $skill) {
            $skills[] = [
                'name' => $skill['name'],
                'level' => $skill['level'],
                /* 'close_at' => $schedule['close'], */
            ];
        }
        return $skills;
    }

    function successfulAppliedJobs($id){
        
        $user_applied = User::find(Auth::id());
        $job_post = LecturerPostJob::find($id);

        if(DB::table('lecturer_post_job_user')->where('user_id', Auth::id())->where('lecturer_post_job_id', $id)->get()->isEmpty()){
            $user_applied->many_job()->attach($id, ['status' => 2]);
        }
        else{
            return back()->with('already-applied', 'You have applied to this job!');
        }
        
        /* $request->hasFile('file_name') && StudentResume::where('user_id', Auth::id())->get()->isEmpty() */
        /* $user_applied->many_job()->sync($user_applied, false); */
        /* $user_applied->many_job()->updateExistingPivot($job_post, ['status'=>'2']); */  /* will update all existing data in pivot */

        return redirect()->route('student.find_jobs')
            ->with('success','Successfully applied!');

        /* $user = Application::where('id', Auth::id());
        if ($user) {
            return redirect()->route('student.find_jobs')
                ->with('error','Already applied!');
        }
        else{
            return redirect()->route('student.find_jobs')
                ->with('success','Successfully applied!');
        } */
        /* if(Application::where('user_id', Auth::id()->exist())){
            return redirect()->route('student.find_jobs')
                ->with('error','Already applied!');
        }
        else{
            return redirect()->route('student.find_jobs')
                ->with('success','Successfully applied!');
        } */
        /* $applied_jobs->many_job()->attach($id); */
        
    }

    /* function showStudentResume(){
        $resume = StudentResume::where('user_id', Auth::id())->get();

        return view('student.student_register_professional_2', compact('resume'));
    } */
    
    /* function studentSkills(Request $request){
        $skill = new StudentSkill;
        $skill->skill_name = $request->skill_name;
        $skill->level = $request->level;
        $skill->save();

        return $request->all();
    } */

    function studentAcceptJobInvitation($id){
        $job_invitation = User::find(Auth::id());

        /* $id = lecturer_post_job_id in pivot table */
        /* sligthly error: should just allow for one time applied for each, otherwise, once click, all same lecturer_post_job_id will have its status changed */
        $job_invitation->many_job()->updateExistingPivot($id, ['status'=>'3']);

        return redirect()->back();
    }

    function studentRejectJobInvitation($id){
        $job_invitation = User::find(Auth::id());

        /* sligthly error: should just allow for one time applied for each, otherwise, once click, all same lecturer_post_job_id will have its status changed */
        $job_invitation->many_job()->updateExistingPivot($id, ['status'=>'5']);

        return redirect()->back();
    }

    function studentUploadProfilePhoto(Request $request){
        $validatedData = $request->validate([
            'profile_picture' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048000',
        ]);

        $file = $request->file('profile_picture');
        if($request->hasFile('profile_picture')){
            $filename = $file->getClientOriginalName();
            Storage::putFileAs('public/student_profile_photo', $file, $filename);
            StudentProfile::where('user_id', Auth::id())->update([
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
    function studentDownloadResume($id){
        $file = StudentResume::find($id);
        $pathToFile = public_path('storage/resumes/'.$file->file_name);
        $resume_name = $file->file_name;
        $headers = ['Content-Type: application/zip'];

        return Response::download($pathToFile, $resume_name, $headers);
    }

    function studentDeleteResume($id){
        $delete_resume = StudentResume::where('id', $id)->delete();
        return redirect()->back()->with('delete-resume','Resume has been deleted!');
    }

    function studentWithdrawJobApplication($id){
        $applied_student = User::find(Auth::id());
        $applied_job = LecturerPostJob::find($id);

        $applied_student->many_job()->detach($id);

        return redirect()->back()->with('withdraw-success','Withdraw job application is successful!');
    }

    function studentViewLecturerProfile($id){
        $profile_details = LecturerProfile::where('user_id', '=', $id)->first();
        $profile = User::find($id);
        $lecturer_academic = LecturerAcademicQualification::where('user_id', '=', $id)->get();

        return view('student.student_view_lecturer_profile', compact('profile_details', 'profile', 'lecturer_academic'));
    }
}
