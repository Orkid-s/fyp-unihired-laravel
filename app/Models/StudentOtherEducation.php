<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOtherEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_of_uni',
        'uni_name',
        'level_education',
        'major',
        'education_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
