<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseType;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontend_home()
    {
        $course_types = CourseType::all();
        return view("welcome", compact("course_types"));
    }

    public function register_success()
    {
        return view("frontend.register_success");
    }

    public function about()
    {
        $course_types = CourseType::all();
        return view("frontend.about", compact("course_types"));
    }

    public function course_search(Request $request)
    {
        $courses = Courses::where("course_name", "like", "%" . $request->course_name . "%")->get();
        return redirect()->route('course_search_view')->with([
            'courses' => $courses,
        ]);
    }
    // i make 2 route for search bar. so that if user refresh the page , post method error is not shown 
    public function course_search_view()
    {
        $course_types = CourseType::all();
        $courses = session('courses', []);
        return view("frontend.courses", compact("courses", "course_types"));
    }
}
