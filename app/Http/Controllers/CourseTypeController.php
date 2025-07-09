<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CourseTypeController extends Controller
{
    public function admin_course_type_add(Request $request){
        $validation = validator($request->all(), [
            "name" => 'required|min:3'
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }
        $course_type = CourseType::create([
            "name" => $request->name
        ]);
        if($course_type){
            return back()->with("success","New Course Added");
        }
    }

    public function admin_course_type_delete($id){
        CourseType::where("id", $id)->delete();
        return redirect()->back()->with(['success' => 'Course type deleted successfully ']);

    }

    public function admin_course_type_edit(Request $request,$id){
        $edit = CourseType::where('id', $id)->update([
            'name'=> $request->name
        ]);
        if($edit){
            return redirect()->back()->with('success','Course type updated');
        }

    }


}
