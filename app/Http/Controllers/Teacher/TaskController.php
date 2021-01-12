<?php

namespace App\Http\Controllers\Teacher;

use App\Classroom;
use App\Course;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Student;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class TaskController extends Controller
{
    function __construct (Task $task) {
        return $this->item = $task;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->item->all();

        //
        return view('pages.teacher.task.index', compact('tasks'));
    }

    public function get_by_classroom  ($classroom) {
        $classroom = Classroom::find($classroom);
        $items = $this->item->where('classroom_id', $classroom->id)->get();

        return view('pages.teacher.task.get_by_classroom', compact('items', 'classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'file' => 'required|file',
            'course_id' => 'required',
            'classroom_id' => 'required',
        ]);

        $path = Storage::putFile(
            'public/tasks',
            $request->file('file')
        );
        $path = substr($path, 7, strlen($path) - 7);

        $task = $this->item->create([
            'title' => $request->title,
            'file' => $path,
            'course_id' => $request->course_id,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->route('teacher.task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = $this->item->find($id);
        $students = Student::where('classroom_id', $task->classroom_id)->orderBy('name', 'asc')->get();

        return view('pages.task.show', ['students' => $students, 'task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
