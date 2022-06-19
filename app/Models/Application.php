<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'job_status',
        'hiring_stages',
    ];

    public function lecturerPostJob()
    {
        return $this->belongsTo(lecturerPostJob::class);
    }
}
