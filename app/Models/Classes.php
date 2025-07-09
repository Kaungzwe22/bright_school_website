<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        "course_id","name","start_time", "end_time","start_date","end_date","avaliable_stu","registered_stu","status"
    ];

    public function courses(){
        return $this->belongsTo(Courses::class, "course_id");
    }

    public function registers(){
        return $this->hasMany(Registers::class,"class_id");
    }
}
