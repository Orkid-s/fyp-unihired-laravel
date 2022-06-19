<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerPostJobRequiredLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'language_name',
        'language_level',
    ];

    public function postJob_Language()
    {
        return $this->belongsTo(LecturerPostJob::class);
    }
}
