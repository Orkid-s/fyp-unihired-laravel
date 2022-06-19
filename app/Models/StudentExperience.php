<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'working_experience',
        'working_year',
        'work_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
