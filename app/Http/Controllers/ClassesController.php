<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Registers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClassesController extends Controller
{
    public function admin_classes_view()
    {
        $classes = Classes::with("courses")->withCount([
            'registers as registered_students_count' => function ($query) {
                $query->where('status', 1);
            }
        ])->get();

        return view("admin.classes.classes_view", compact("classes"));
    }
    public function admin_classes_create_view()
    {
        $courses = Courses::all();
        return view("admin.classes.classes_create", compact("courses"));
    }

    public function admin_classes_add(Request $request)
    {
        $validate = validator($request->all(), [
            "name" => "required|min: 2",
            "course_id" => "required",
            "start_time" => "required|min:2",
            "end_time" => "required|min:2",
            "avaliable_stu" => "required",
            "start_date" => "required|min:2",
            "end_date" => "required",
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $course = Classes::create([
            "course_id" => $request->course_id,
            "name" => $request->name,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "avaliable_stu" => $request->avaliable_stu,
            "registered_stu" => 0,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => 1
        ]);

        if ($course) {
            return redirect()->route("admin_classes_view")->with("success", "New Class ' $request->name ' is added ");
        }
    }

    public function admin_classes_delete($id)
    {
        Classes::destroy($id);

        return back()->with("success", "Course deleted successfully");
    }

    public function admin_classes_detail($id)
    {
        $class = Classes::with("courses")->where("id", $id)->first();
        $courses = Courses::all();

        return view('admin.classes.class_detail', compact('class', 'courses'));
    }

    public function admin_classes_edit(Request $request, $id)
    {

        $validate = validator($request->all(), [
            "name" => "required|min: 2",
            "course_id" => "required",
            "start_time" => "required|min:2",
            "end_time" => "required|min:2",
            "avaliable_stu" => "required",
            "registered_stu" => "required",
            "start_date" => "required|min:2",
            "end_date" => "required",
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Classes::findOrFail($id)->update($request->only([
            'name',
            'course_id',
            'start_time',
            'end_time',
            'avaliable_stu',
            'registered_stu',
            'start_date',
            'end_date',
        ]));
        return redirect()->route('admin_classes_view')->with("success", "Class updated successfully");
    }

    public function admin_classes_student_list($id){
        $class = Classes::with("courses")->where("id", $id)->first();
        $students = Registers::where('class_id', $id)->get();
        return view('admin.classes.class_stu_list', compact('students', 'class'));
    }

}
