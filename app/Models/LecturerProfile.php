<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerProfile extends Model
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
        'college_dept',
        'position',
        'room_no', 
        'office_contact',
        'ext',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
