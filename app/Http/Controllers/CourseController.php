<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function __construct (Course $course) {
        $this->course = $course;
    }

    public function index () {
        $courses = $this->course->orderBy('name', 'asc')->get();

        return view('pages.course.index', compact('courses'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:classrooms,name',
            'teacher_id' => 'required',
        ]);

        $this->course->create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->back()->with('message', 'Mata kuliah berhasil ditambahkan');
    }
}
