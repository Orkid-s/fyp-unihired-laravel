<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'user_id',
        'skills_name',
        'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
