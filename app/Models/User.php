<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //one student has one resume, relationship with student resume class model
    public function studentResume(){
        return $this->hasOne(StudentResume::class);  
    }
    public function studentSkills()
    {
        return $this->hasMany(StudentSkills::class);
    }
    public function studentOtherEducation()
    {
        return $this->hasMany(StudentOtherEducation::class);
    }
    public function studentCertficate()
    {
        return $this->hasMany(StudentCertificate::class);
    }
    public function studentExperience()
    {
        return $this->hasMany(StudentExperience::class);
    }
    public function studentLanguage()
    {
        return $this->hasMany(StudentLanguage::class);
    }


    
    /* lecturers */
    public function lecturerAcademicQualification()
    {
        return $this->hasMany(LecturerAcademicQualification::class);
    }

    /* one lecturer may have many job posting */
    public function lecturerPostJob()
    {
        return $this->hasMany(LecturerPostJob::class);
    }

    //A User has many job posting/applied jobs 
    public function many_job(){
        return $this->belongsToMany(LecturerPostJob::class)->withPivot('status')->withTimestamps();
    }

    public function lecturer_profile()
    {
        return $this->hasOne(LecturerProfile::class, 'user_id');
    }

}
