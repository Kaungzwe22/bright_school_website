<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registers extends Model
{
    protected $fillable = [
        "s_name","email","ph_number","payment_ph","payment_method","status","class_id","course_id"
    ];

    public function classes(){
        return $this->belongsTo(    Classes::class,"class_id");
    }
    public function courses(){
        return $this->belongsTo(    Courses::class,"course_id");
    }
}
