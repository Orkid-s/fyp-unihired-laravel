<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentProfile;
use App\Models\StudentSkill;
use App\Models\StudentOtherEducation;
use App\Models\StudentCertificate;
use App\Models\StudentExperience;
use App\Models\Studentlanguage;

class StudentProfileCompletionLivewire extends Component
{
    /* declare public variable */
    public $currentStep = 1;
    public $full_name, $profile_picture, $description, $gender, $DOB, $age, $phone, $town, $city, $ZIP, $state, $country, $course_name, $year_studies = 1, $semester = 1, $year_semester, $college, $website, $linkedin, $github, $user_id;

    /* for repeated forms */
    public $updateMode = false;
    public $inputsSkills = [], $inputsCertificate = [], $inputsWorking = [], $inputsLanguage = [], $inputsEducation = [];
    public $i = 1, $x = 1, $y = 1, $z = 1, $n = 1;


    public function render()
    {
        return view('livewire.student-profile-completion-livewire');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepPersonalInfo(){
        $validatedData = $this->validate([
            'full_name' => 'required|string|max:255',
            /* 'profile_picture' => 'required', */
            'description' => 'required|string|max:300',
            'gender' => 'required',
            'DOB' => 'required|date',
            'age' => 'integer|required',
            'phone' => 'numeric|required|digits_between:10,11',
            'town' => 'required|string',
            'city' => 'required|string',
            'ZIP' => 'integer|required|digits:5',
            'state' => 'required|string',
            'country' => 'required|string',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepProfessionalInfo(){
        $validatedData = $this->validate([
            'course_name' => 'required|string',
            'year_studies' => 'integer|required',
            'semester' => 'integer|required',
            'year_semester' => 'integer|required',
            'college' => 'required',
            'website' => 'required',
            'linkedin' => 'required',
            'github' => 'required',
            
            /* validation for other education */
            'country_of_uni.0' => 'required',
            'uni_name.0' => 'required',          
            'level_education.0' => 'required',
            'major.0' => 'required',
            'education_year.0' => 'integer|required',
            'country_of_uni.*' => 'required',
            'uni_name.*' => 'required',          
            'level_education.*' => 'required',
            'major.*' => 'required',
            'education_year.*' => 'integer|required',

            /* validation for skills */
            'skills_name.0' => 'required',
            'level.0' => 'required',          
            'skills_name.*' => 'required',
            'level.*' => 'required',

            /* validation for other certificate */
            'certificate_name.0' => 'required',
            'uni_name.0' => 'required',          
            'certified_by.0' => 'required',
            'certificate_year.0' => 'integer|required',
            'certificate_name.*' => 'required',
            'uni_name.*' => 'required',          
            'certified_by.*' => 'required',
            'certificate_year.*' => 'integer|required',

            /* validation for other experience */
            'working_experience.0' => 'required',
            'uni_name.0' => 'required',          
            'working_year.0' => 'integer|required',
            'work_description.0' => 'required',
            'working_experience.*' => 'required',
            'uni_name.*' => 'required',          
            'working_year.*' => 'integer|required',
            'work_description.*' => 'required',

            /* validation for other language */        
            'language_name.0' => 'required|string',
            'language_level.0' => 'required',
            'language_name.*' => 'required|string',
            'language_level.*' => 'required',
            
        ]);

        StudentProfile::create([
            'user_id' => Auth::id(), 
            'full_name' => $this->full_name,
            'profile_picture' => $this->profile_picture,
            'description' => $this->description,
            'gender'=> $this->gender,
            'DOB' => $this->DOB,
            'age' => $this->age,
            'phone' => $this->phone,
            'town'=> $this->town,
            'city'=> $this->city,
            'ZIP'=> $this->ZIP,
            'state'=> $this->state,
            'country'=> $this->country,
        ]);

        StudentProfile::where('user_id', Auth::id())->update([
            'course_name'=>$this->course_name,
            'year_studies'=>$this->year_studies,
            'semester'=>$this->semester,
            'year_semester'=>$this->year_semester,
            'college'=>$this->college,
            'website'=>$this->website,
            'linkedin'=>$this->linkedin,
            'github'=>$this->github,
        ]);

        foreach ($this->skills_name as $key => $value) {
            StudentSkill::create([
                'user_id' => Auth::id(), 
                'skills_name' => $this->skills_name[$key], 
                'level' => $this->level[$key]]);
        }

        foreach ($this->uni_name as $key => $value) {
            StudentOtherEducation::create([
                'user_id' => Auth::id(),
                'country_of_uni'=>$this->country_of_uni[$key],
                'uni_name'=>$this->uni_name[$key],
                'level_education'=>$this->level_education[$key],
                'major'=>$this->major[$key],
                'education_year'=>$this->education_year[$key],
            ]);
        }

        foreach ($this->certificate_name as $key => $value) {
            StudentCertificate::create([
                'user_id' => Auth::id(),
                'certificate_name'=>$this->certificate_name[$key],
                'certified_by'=>$this->certified_by[$key],
                'certificate_year'=>$this->certificate_year[$key],
            ]);
        }

        foreach ($this->working_experience as $key => $value) {
            StudentExperience::create([
                'user_id' => Auth::id(),
                'working_experience'=>$this->working_experience[$key],
                'working_year'=>$this->working_year[$key],
                'work_description'=>$this->work_description[$key],
            ]);
        }

        foreach ($this->language_name as $key => $value) {
            Studentlanguage::create([
                'user_id' => Auth::id(),
                'language_name'=>$this->language_name[$key],
                'language_level'=>$this->language_level[$key],
            ]);
        }

        $this->inputsSkills = [];
        $this->inputsEducation = [];
        $this->inputsCertificate = [];
        $this->inputsWorking = [];
        $this->inputsLanguage = [];

        /* reset input form */
        $this->resetSkillInputFields();
        $this->resetEducationInputFields();
        $this->resetcertificateInputFields();
        $this->resetWorkingInputFields();
        $this->resetLanguageInputFields();

        $this->currentStep = 3; 

        /* clear personal info form */
        $this->clearForm();

        /* back to first page personal info */
           
    }

    public function thirdStepProfessionalInfo(){
        return view('student.student_profile');
    }

    public function clearForm(){
        $this->full_name = '';
        /* $this->profile_picture = ''; */
        $this->description = '';
        $this->gender = '';
        $this->DOB = '';
        $this->age = '';
        $this->phone = '';
        $this->town = '';
        $this->city = '';
        $this->ZIP = '';
        $this->state = '';
        $this->country = '';
        $this->course_name = '';
        $this->year_studies = '';
        $this->semester = '';
        $this->year_semester = '';
        $this->college = '';
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }
        
    /* EDUCATION */
    public $country_of_uni, $uni_name, $level_education = "foundation", $major, $education_year;

    public function addEducation($n)
    {
        $n = $n + 1;
        $this->n = $n;
        array_push($this->inputsEducation ,$n);
    }

    public function removeEducation($n)
    {
        unset($this->inputsEducation[$n]);
    }
    private function resetEducationInputFields(){
        $this->country_of_uni = '';
        $this->uni_name = '';
        $this->level_education = '';
        $this->major = '';
        $this->education_year = '';
    }

    /* SKILLS */
    public $skills_name, $level;

    public function addSkills($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputsSkills ,$i);
    }

    public function removeSkills($i)
    {
        unset($this->inputsSkills[$i]);
    }

    private function resetSkillInputFields(){
        $this->skills_name = '';
        $this->level = '';
    }


    /* CERTIFICATE */
    public $certificate_name, $certified_by, $certificate_year;

    public function addCertificate($x)
    {
        $x = $x + 1;
        $this->x = $x;
        array_push($this->inputsCertificate ,$x);
    }

    public function removeCertificate($x)
    {
        unset($this->inputsCertificate[$x]);
    }
    private function resetcertificateInputFields(){
        $this->certificate_name = '';
        $this->certified_by = '';
        $this->certificate_year = '';
    }

    /* WORKING EXPERIENCE */
    public $working_experience, $working_year, $work_description;

    public function addWorking($y)
    {
        $y = $y + 1;
        $this->y = $y;
        array_push($this->inputsWorking ,$y);
    }

    public function removeWorking($y)
    {
        unset($this->inputsWorking[$y]);
    }
    private function resetWorkingInputFields(){
        $this->working_experience = '';
        $this->working_year = '';
        $this->work_description = '';
    }

    /* LANGUAGE */
    public $language_name, $language_level="Basic";

    public function addLanguage($z)
    {
        $z = $z + 1;
        $this->z = $z;
        array_push($this->inputsLanguage ,$z);
    }

    public function removeLanguage($z)
    {
        unset($this->inputsLanguage[$z]);
    }
    private function resetLanguageInputFields(){
        $this->language_name = '';
        $this->language_level = 'Basic';
    }
}
