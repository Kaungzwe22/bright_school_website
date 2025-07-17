<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\CourseType;
use App\Models\Registers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function frontend_register(Request $request)
    {
        $course_types = CourseType::all();
        return view("frontend.register", compact('course_types'));
    }

    public function frontend_register_post(Request $request)
    {
        $validate = validator($request->all(), [
            "s_name" => "required|min:2",
            "course_id" => "required",
            "email" => "required",
            "class_id" => "required",
            "ph_number" => "required",
            "payment_ph" => "required|min:2",
            "payment_method" => "required|min:2",
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $datas = $request->all();
        $datas['status'] = 0;

        Registers::create($datas);

        $course_name = Courses::where('id', $request->course_id)->value('course_name');
        $class_info = Classes::where('id', $request->class_id)->get();
        $course_types = CourseType::all();

        return view('frontend.register_success', [
            'data' => $datas,
            'course_name' => $course_name,
            'class_info' => $class_info,
            'course_types' => $course_types
        ]);
    }

    // admin section

    public function admin_register_view()
    {
        $registers = Registers::with(['classes', 'courses'])->where('status', 0)->get();
        $total = $registers->count();
        // dd($registers);

        return view('admin.register.register_view', compact('registers', 'total'));
    }

    public function admin_register_accept($id)
    {

        $class_id = Registers::where('id', $id)->value('class_id');

        $registeredStudentCount = Registers::where('class_id', $class_id)
            ->where('status', 1)
            ->count();

        $limited_stu = Classes::where('id', $class_id)->value('avaliable_stu');

        if ($registeredStudentCount < $limited_stu) {
            $register = Registers::find($id);
            $register->status = 1;
            $register->save();

            return back()->with('accept_success', 'Student accept successfully');
        } else{
            return back()->withErrors(['error' => 'Class is full. Can not add new student']);
        }
    }

    public function admin_register_cancel($id)
    {
        Registers::find($id)->delete();
        return back()->with('delete_success', 'Student is cancel. Dont forget to email why he/she is cancel');
    }
}
