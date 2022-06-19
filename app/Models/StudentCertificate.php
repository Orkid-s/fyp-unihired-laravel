<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_name',
        'certified_by',
        'certificate_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
