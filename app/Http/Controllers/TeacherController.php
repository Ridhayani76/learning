<?php

namespace App\Http\Controllers;

use App\Course;
use App\Task;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function __construct (Task $task, Course $course, Teacher $teacher) {
        $this->task = $task;
        $this->course = $course;
        $this->teacher = $teacher;
    }
    //
    public function dashboard () {

        $course_ids = $this->course
            ->where('teacher_id', auth()->user()->teacher->id)
            ->get()
            ->map(function ($course) {
            return $course->id;
        });

        $tasks = $this->task
            ->whereDate('created_at', date('Y-m-d'))
            ->whereIn('course_id', $course_ids)
            ->orderBy('created_at', 'desc')
            ->skip(0)
            ->take(5)
            ->get();

        return view('pages.teacher.dashboard', compact('tasks'));
    }

    public function index () {
        $teachers = $this->teacher->orderBy('name', 'asc')->get();

        return view('pages.teacher.index', compact('teachers'));
    }
}
