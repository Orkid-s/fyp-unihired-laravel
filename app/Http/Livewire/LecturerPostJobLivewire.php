<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LecturerPostJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LecturerPostJobLivewire extends Component
{

    public function submitForm(Request $request){
        $validatedData = $this->validate([
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
            'job_title' => $this->job_title,
            'job_brief' => $this->job_brief,
            'job_responsibilities' => $this->job_responsibilities,
            'employment_type'=> $this->employment_type,
            'num_of_recruitment' => $this->num_of_recruitment,
            'allowance' => $this->allowance,
            'skills_name' => $this->skills_name,
            'job_duration' => $this->job_duration,
            'job_duration_type'=> $this->job_duration_type,
            'start_date'=> $this->start_date,
            'end_date'=> $this->end_date,
            'work_location'=> $this->work_location,
            'language_name' => $this->language_name,
            'language_level' => $this->language_level,
            'title_research_project'=> $this->title_research_project,
            'research_project_brief'=> $this->research_project_brief,
            'college_dept'=> $this->college_dept, 
        ]);
        
        return redirect()->route('lecturer.talents_feed');

        /* foreach ($this->skills_name as $key => $value) {
            $post = LecturerPostJob::find($id);
            $job_skills = new LecturerPostJobRequiredSkills();
            $job_skills->skills_name = 'This is second skills.';
            $post->lecturerPostJobSkills()->save($job_skills);

        } */
    }
}
