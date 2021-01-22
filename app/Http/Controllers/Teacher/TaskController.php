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
    function __construct (Task $task, Classroom $classroom) {
        $this->item = $task;
        $this->classroom = $classroom;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = $request->date ? $request->date : date('Y-m-d');
        $dateDisplay = date('F j D, Y', strtotime($date));

        $prev = date('Y-m-d', strtotime('-1 days', strtotime($date)));
        $next = date('Y-m-d', strtotime('+1 days', strtotime($date)));

        $classrooms = $this->classroom->with(['tasks' => function ($task) use ($date) {
            return $task->whereDate('created_at', $date);
        }])->orderBy('name', 'asc')->get();
        $amount_of_tasks = $classrooms->map(function ($classroom) {
            return $classroom->tasks->count();
        })->flatten()->reduce(function ($total, $amount) {
            $total += $amount;
            return $total;
        });

        //
        return view('pages.teacher.task.index', compact('date', 'dateDisplay', 'classrooms', 'amount_of_tasks', 'prev', 'next'));
    }

    public function get_by_classroom  (Request $request, $classroom) {
        $date = $request->date ? $request->date : date('Y-m-d');
        $dateDisplay = date('F j D, Y', strtotime($date));

        $classroom = Classroom::find($classroom);
        $items = $this->item->whereDate('created_at', $date)->where('classroom_id', $classroom->id)->orderBy('created_at', 'desc')->get();

        return view('pages.teacher.task.get_by_classroom', compact('items', 'classroom', 'date' , 'dateDisplay'));
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
            'max_date_upload' => $request->max_date_upload,
        ]);

        return redirect()->route('teacher.task.get_by_classroom', ['classroom' => $request->classroom_id]);
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
        $students = Student::orderBy('name', 'asc')->where('classroom_id', $task->classroom_id)->orderBy('name', 'asc')->get();

        return view('pages.teacher.task.show', ['students' => $students, 'task' => $task]);
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
