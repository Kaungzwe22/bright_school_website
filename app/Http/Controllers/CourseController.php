<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\CourseType;
use COM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class CourseController extends Controller
{
    public function frontend_courses($id = 0)
    {
        $course_types = CourseType::all();
        if ($id != 0) {
            $courses = Courses::with('courseType')->where('course_type', $id)->get();
            $course_type_name = $courses->first()?->courseType?->name;
            return view("frontend.courses", compact("courses", "course_types", 'course_type_name'));
        } else {
            $courses = Courses::all();
            return view("frontend.courses", compact("courses", "course_types"));
        }
    }

    public function frontend_courses_detail($id)
    {
        $course_types = CourseType::all();
        $course = Courses::with('classes')->where("id", $id)->first();

        return view("frontend.course", compact("course","course_types"));
    }

    public function admin_course_view()
    {
        $course_types = CourseType::all();
        $courses = Courses::with('courseType')->get();
        return view("admin.courses.courses_view", compact("course_types", "courses"));
    }
    public function admin_courses_create_view()
    {
        $course_types = CourseType::all();
        return view("admin.courses.courses_create", compact("course_types"));
    }

    public function admin_course_add(Request $request)
    {
        $validate = validator($request->all(), [
            "course_name" => "required|min:2",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg",
            "des" => "required|min:2",
            "duration" => "required",
            "hours" => "required",
            "normal_price" => "required",
            "course_type" => "required",
            "about" => "required|min:2",
            "included" => "required|min:2",
            'links' => 'nullable|string|min:2',

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = $request->only([
            'course_name',
            'duration',
            'des',
            'normal_price',
            "duration",
            "hours",
            'about',
            'included',
            'links',
            'course_type',
        ]);

        $data['special_price'] = $request->input('special_price') ?? 0;

        if ($request->hasFile('image')) {
            $filename = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $filename);
            $data["image"] = $filename;
        }

        $data["status"] = 1;

        // dd($data);

        $course_create = Courses::create($data);

        if ($course_create) {
            return redirect()->route('admin_course_view')->with('success', 'New Course is added');
        }
    }

    public function admin_course_edit_view($id)
    {
        $course_types = CourseType::get();
        $course = Courses::with('courseType')->where('id', $id)->first();

        return view('admin.courses.course_edit', compact('course_types', 'course'));
    }

    public function admin_course_update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            "course_name" => "required|min:2",
            "des" => "required|min:2",
            "duration" => "required",
            "hours" => "required",
            "normal_price" => "required",
            "special_price" => "required",
            "course_type" => "required",
            "about" => "required|min:2",
            "included" => "required|min:2",
            'links' => 'nullable|string|min:2',

        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $course = Courses::findOrFail($request->id);

        $course->course_name = $request->course_name;
        $course->des = $request->des;
        $course->hours = $request->hours;
        $course->duration = $request->duration;
        $course->normal_price = $request->normal_price;
        $course->special_price = $request->special_price ?? 0;
        $course->course_type = $request->course_type;
        $course->about = $request->about;
        $course->included = $request->included;
        $course->links = $request->links;

        if ($request->hasFile('new_image')) {
            $old_image = $course->image;
            Storage::delete('public/' . $old_image);

            $filename = uniqid() . '_' . $request->file('new_image')->getClientOriginalName();
            $request->file('new_image')->storeAs('public', $filename);
            $course->image = $filename;
        }

        $course->save();

        return redirect()->route('admin_course_view')->with('success', 'Course updated successfully.');
    }
}
