<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'subject_id'];

    
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function schoolClasses()
    {
        
        return $this->belongsToMany(SchoolClass::class, 'school_class_teacher');
    }
}