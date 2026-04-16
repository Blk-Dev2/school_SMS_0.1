<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = ['class_name', 'grade_level', 'section', 'academic_year'];

    public function teachers()
    {
        
        return $this->belongsToMany(Teacher::class, 'school_class_teacher', 'school_class_id', 'teacher_id');
    }
}
