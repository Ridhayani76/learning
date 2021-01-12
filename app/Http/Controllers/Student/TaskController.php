<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Schedule;
use App\Task;
use App\TaskUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    //
    function __construct (Task $task) {
        return $this->item = $task;
    }

    public function index () {
        $classroom = auth()->user()->student->classroom_id;

        $items = $this->item->where('classroom_id', $classroom)->get();

        return view('pages.student.task.index', compact('items'));
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
