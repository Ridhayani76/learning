<?php

namespace App\Http\Controllers;

use App\Practice;
use App\PracticeMember;
use App\Student;
use App\Task;
use Illuminate\Http\Request;
use App\Classroom;

class StudentController extends Controller
{
    function __construct (Practice $practice, PracticeMember $practiceMember, Student $student, Task $task) {
        $this->practice = $practice;
        $this->practiceMember = $practiceMember;
        $this->student = $student;
        $this->task = $task;
    }
    //
    public function dashboard () {
        $student = \Auth::user()->student;

        $practices = $this->practiceMember
            ->where('student_id', $student->id)
            ->get()
            ->map(function ($pm) {
                return $pm->practice;
            });

        $tasks = $this->task->whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'desc')->where('classroom_id', auth()->user()->student->classroom_id)->get();

        return view('pages.student.dashboard', compact('practices', 'tasks'));
    }

    public function index (Classroom $classroom) {
        $students = $this->student->where('classroom_id', $classroom->id)->orderBy('name', 'asc')->get();

        return view('pages.student.index', compact('students', 'classroom'));
    }
}
