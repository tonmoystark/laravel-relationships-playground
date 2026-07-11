<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{

    protected $fillable = [
        'phone',
        'address',
        'guardian_name',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
