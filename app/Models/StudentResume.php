<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_name'
    ];

    //student resume belongs to user class 
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
