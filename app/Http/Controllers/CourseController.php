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
}
