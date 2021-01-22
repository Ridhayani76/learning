<?php

namespace App\Http\Controllers;

use App\Practice;
use App\PracticeMember;
use App\Student;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Classroom;

class StudentController extends Controller
{
    function __construct (Practice $practice, PracticeMember $practiceMember, Student $student, Task $task, User $user) {
        $this->practice = $practice;
        $this->practiceMember = $practiceMember;
        $this->student = $student;
        $this->task = $task;
        $this->user = $user;
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

    public function store (Request $request, Classroom $classroom) {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required|unique:students,nim',
        ]);

        $user = $this->user->create([
            'username' => $request->nim,
            'password' => bcrypt(strtolower(explode(' ', $request->name)[0])),
            'role' => 'student',
        ]);

        $this->student->create([
            'name' => $request->name,
            'nim' => $request->nim,
            'user_id' => $user->id,
            'classroom_id' => $classroom->id,
        ]);

        return redirect()->back()->with('message', 'Murid berhasil ditambahkan');
    }
}
