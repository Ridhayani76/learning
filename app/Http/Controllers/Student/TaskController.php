<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Task;
use App\TaskUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    //
    function __construct (Task $task, Course $course) {
        $this->item = $task;
        $this->course = $course;
    }

    public function index (Request $request) {

        $courses = $this->course->orderBy('name', 'asc')->get();

        return view('pages.student.task.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task_id' => 'required',
            'file' => 'required|file',
        ]);

        $path = Storage::putFile(
            'public/taskuploads',
            $request->file('file')
        );
        $path = substr($path, 7, strlen($path) - 7);

        //
        $params = [
            'task_id' => $request->task_id,
            'student_id' => auth()->user()->student->id,
            'file' => $path,
            'note' => $request->note,
        ];

        $action = TaskUpload::create($params);

        return redirect()->route('student.task.index')->with('msg', 'Tugas berhasil di upload');
    }
}
