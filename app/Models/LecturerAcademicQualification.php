<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerAcademicQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_of_uni',
        'uni_name',
        'level_education',
        'major',
        'from_year',
        'until_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
