<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $table = "course_type";
    protected $fillable = [
        "name"
    ];
    public function courses()
    {
        return $this->hasMany(Courses::class, 'course_type');
    }
}
