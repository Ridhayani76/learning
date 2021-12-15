<?php

namespace App\Http\Controllers;

use App\Course;
use App\Task;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Alert;

class TeacherController extends Controller
{
    function __construct (Task $task, Course $course, Teacher $teacher, User $user) {
        $this->task = $task;
        $this->course = $course;
        $this->teacher = $teacher;
        $this->user = $user;
    }
    //
    public function dashboard () {
        $teacher = \Auth::user()->teacher;

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

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'nip' => 'required|unique:teachers,nip',
        ]);

        $user = $this->user->create([
            'username' => $request->nip,
            'password' => bcrypt(strtolower(explode(' ', $request->name)[0])),
            'role' => 'teacher',
        ]);

        $this->teacher->create([
            'name' => $request->name,
            'nip' => $request->nip,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('message', 'Guru berhasil ditambahkan');
    }

    public function reset_password (Teacher $teacher) {
        $teacher->user->update([
            'password' => bcrypt(strtolower(explode(' ', $teacher->name)[0])),
        ]);

        return response()->json(['message' => 'Password berhasil di reset']);
    }
}
