<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function frontend_projects(){
        $course_types = CourseType::all();
        return view("frontend.projects", compact('course_types'));
    }

    public function admin_project_view(){
        return view("admin.projects.projects_view");
    }

    public function admin_project_detail_view(){
        return view("admin.projects.project_detail");
    }
}
