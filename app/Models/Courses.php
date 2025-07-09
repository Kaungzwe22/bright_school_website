<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "courses";
    protected $fillable = [
        "course_name","image","des","normal_price","special_price","duration","hours","about","included","links","status","course_type"
    ];
    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type');
    }

    public function classes(){
        return $this->hasMany(Classes::class,'course_id');
    }
    public function registers(){
        return $this->hasMany(Registers::class,'course_id');
    }
}
