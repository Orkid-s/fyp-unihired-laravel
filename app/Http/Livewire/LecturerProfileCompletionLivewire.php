<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LecturerProfile;
use App\Models\LecturerAcademicQualification;
use Illuminate\Support\Facades\Auth;

class LecturerProfileCompletionLivewire extends Component
{
    /* declare public variable */
    public $currentStep = 1;
    public $full_name, $profile_picture, $description, $gender, $DOB, $age, $phone, $user_id, $college_dept, $position, $room_no, $office_contact, $ext, $country_of_uni, $uni_name, $level_education, $major, $from_year, $until_year;
    public $success='';

    /* for repeated forms */
    public $updateMode = false;
    public $inputsAcademicQualifications = [], $inputsSkills = [];
    public $i = 1;

    public function render()
    {
        return view('livewire.lecturer-profile-completion-livewire');
    }

    public function firstStepPersonalInfo(){
        $validatedData = $this->validate([
            'full_name' => 'required|string|max:255',
            /* 'profile_picture' => 'required', */
            'description' => 'required|string|max:300',
            'gender' => 'required',
            'DOB' => 'required|date',
            'age' => 'integer|required',
            'phone' => 'numeric|required|digits_between:10,11',
        ]);

        $this->currentStep = 2;
    }

    public function secondStepProfessionalInfo(){
        $validatedData = $this->validate([
            'college_dept' => 'required',
            'position' => 'required|string',
            'room_no' => 'required',
            'office_contact' => 'numeric|required|digits_between:10,11',
            'ext' => 'integer|required',

            /* validation for academic qualification */
            'country_of_uni.0' => 'required',
            'uni_name.0' => 'required',          
            'level_education.0' => 'required',
            'major.0' => 'required',
            'from_year.0' => 'integer|required|digits:4',
            'until_year.0' => 'integer|required|digits:4',

            'country_of_uni.*' => 'required',
            'uni_name.*' => 'required',          
            'level_education.*' => 'required',
            'major.*' => 'required',
            'from_year.*' => 'integer|required|digits:4',
            'until_year.*' => 'integer|required|digits:4',
        ]);

        LecturerProfile::create([
            'user_id' => Auth::id(), 
            'full_name' => $this->full_name,
            'profile_picture' => $this->profile_picture,
            'description' => $this->description,
            'gender'=> $this->gender,
            'DOB' => $this->DOB,
            'age' => $this->age,
            'phone' => $this->phone,
            'college_dept' => $this->college_dept,
            'position' => $this->position,
            'room_no' => $this->room_no,
            'office_contact' => $this->office_contact,
            'ext' => $this->ext,
        ]);

        foreach ($this->country_of_uni as $key => $value) {
            LecturerAcademicQualification::create([
                'user_id' => Auth::id(), 
                'country_of_uni' => $this->country_of_uni[$key], 
                'uni_name' => $this-> uni_name[$key],
                'level_education' => $this->level_education[$key],
                'major' => $this->major[$key],
                'from_year' => $this->from_year[$key],
                'until_year' => $this->until_year[$key],
            ]);
        }

        $this->inputsAcademicQualifications = [];
        $this->resetAcademicQualificationsInputFields();

        $this->currentStep = 3;
        
        /* clear personal info form */
        $this->clearForm();
    }

    public function clearForm(){
        $this->full_name = '';
        /* $this->profile_picture = ''; */
        $this->description = '';
        $this->gender = '';
        $this->DOB = '';
        $this->age = '';
        $this->phone = '';
        $this->country_of_uni = '';
        $this->uni_name = '';
        $this->level_education = '';
        $this->major = '';
        $this->from_year = '';
        $this->until_year = '';
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function addAcademicQualifications($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputsAcademicQualifications ,$i);
    }

    public function removeAcademicQualifications($i)
    {
        unset($this->inputsAcademicQualifications[$i]);
    }

    private function resetAcademicQualificationsInputFields(){
        $this->country_of_uni = '';
        $this->uni_name = '';
        $this->level_education = '';
        $this->major = '';
        $this->from_year = '';
        $this->until_year = '';
    }
}