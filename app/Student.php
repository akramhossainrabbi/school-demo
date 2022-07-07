<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name'];

    public function results()
    {
        return $this->hasMany(Result::class, 'student_id');
    }
}
