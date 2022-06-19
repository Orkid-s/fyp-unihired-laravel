<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'profile_picture',
        /* 'profile_status', */
        'description',
        'gender',
        'age',
        'DOB',
        'phone',
        'town',
        'city',
        'ZIP',
        'state',
        'country',
        'course_name',
        'year_studies',
        'course_name',
        'semester',
        'year_semester',
        'college',
        'website',
        'linkedin',
        'github',
    ];
}
