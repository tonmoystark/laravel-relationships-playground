<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function profile()
    {
        return $this->hasOne(StudentProfile::class);
    }
}
