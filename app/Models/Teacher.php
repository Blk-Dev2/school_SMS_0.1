<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    // يجب أن تشمل القائمة كل الخانات التي ترسلها من الفورم
    protected $fillable = ['name', 'email', 'phone', 'subject_id', 'subject'];
    public function subject() {
      return $this->belongsTo(Subject::class);
    }
}