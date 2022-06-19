<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerPostJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_title',
        'job_brief',
        'job_responsibilities',
        'skills_name',
        'job_status',
        'num_of_recruitment',
        'allowance',
        'job_duration',
        'job_duration_type',
        'start_date',
        'end_date',
        'work_location',
        'language_name',
        'language_level',
        'title_research_project',
        'research_project_brief',
        'college_dept',
        'job_status',
    ];

    //job posting belongs to user class --> based on user id
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* public function appliedJobs()
    {
        return this->hasMany(Application::class);
    } */

    public function appliedJobs()
    {
        return $this->belongsToMany(User::class)->withPivot('status')->withTimestamps();
    }
}



