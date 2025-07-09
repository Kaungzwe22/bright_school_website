<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        "title","s_name","image","batch","github_links","demo_links","course_id",
    ];

    public function courses(){
        return $this->belongsTo(Courses::class, "course_id");
    }
}
