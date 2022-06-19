<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerPostJobRequiredSkills extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'skills_name',
    ];

    public function postJob_Skill()
    {
        return $this->belongsTo(LecturerPostJob::class);
    }

    //Job has one lecturer user
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //A job has  many applied student
    public function many_user(){
    	return $this->hasMany(User::class)->withTimestamps();
    }
}
