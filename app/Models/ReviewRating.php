<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'student_id',
        'job_id',
        'star_rating',
        'review',
    ];
}
