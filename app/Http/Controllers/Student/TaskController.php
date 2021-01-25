<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Task;
use App\TaskUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Acaronlex\LaravelCalendar\Calendar;
use phpDocumentor\Reflection\Types\Collection;

class TaskController extends Controller
{
    //
    function __construct (Task $task, Course $course) {
        $this->item = $task;
        $this->course = $course;
    }

    public function getColor ($task) {
        $student_id = auth()->user()->student->id;

        if ($task->hasNotUploaded($student_id)) {
            return "#e1d8cf";
        } elseif ($task->hasUploaded($student_id)) {
            return "#75ca9b";
        } elseif ($task->hasAssessed($student_id)) {
            return "#2B7D75";
        }
    }

    public function index (Request $request) {

        $date = $request->date ? $request->date : date('Y-m-d');
        $student = auth()->user()->student;
        $classroom = $student->classroom;

        $courses = $this->course
            ->orderBy('name', 'asc')
            ->with(['tasks' => function ($task) use ($date, $classroom) {
                $task->where('classroom_id', $classroom->id)->whereDate('created_at', $date)->get();
            }])
            ->get()
            ->map(function ($course) use ($student) {
            $course->task_finished = $course->tasks->filter(function ($task) use ($student) {
                return $task->hasAssessed($student->id);
            })->count();
            $course->task_finished_percentage = $course->task_finished > 0 ?  ($course->task_finished/ $course->tasks->count() * 100) : 0;

            $course->task_submited = $course->tasks->filter(function ($task) use ($student) {
               return $task->hasUploaded($student->id);
            })->count();
            $course->task_submited_percentage = $course->task_submited > 0 ? ($course->task_submited / $course->tasks->count() * 100) : 0;

            $course->task_unsubmited = $course->tasks->filter(function ($task) use ($student) {
                return $task->hasNotUploaded($student->id);
            })->count();
            $course->task_unsubmited_percentage = $course->task_unsubmited > 0 ? ($course->task_unsubmited / $course->tasks->count() * 100) : 0;

            return $course;
        });

        $all_tasks = $courses->map(function ($course) {
            return $course->tasks;
        })->flatten()->count();


        $courses_alltime = $this->course
            ->orderBy('name', 'asc')
            ->with(['tasks' => function ($task) use ($classroom) {
                $task->where('classroom_id', $classroom->id)->get();
            }])
            ->get()
            ->map(function ($course) use ($student) {
                $course->task_finished = $course->tasks->filter(function ($task) use ($student) {
                    return $task->hasAssessed($student->id);
                })->count();
                $course->task_finished_percentage = $course->task_finished > 0 ?  ($course->task_finished/ $course->tasks->count() * 100) : 0;

                $course->task_submited = $course->tasks->filter(function ($task) use ($student) {
                    return $task->hasUploaded($student->id);
                })->count();
                $course->task_submited_percentage = $course->task_submited > 0 ? ($course->task_submited / $course->tasks->count() * 100) : 0;

                $course->task_unsubmited = $course->tasks->filter(function ($task) use ($student) {
                    return $task->hasNotUploaded($student->id);
                })->count();
                $course->task_unsubmited_percentage = $course->task_unsubmited > 0 ? ($course->task_unsubmited / $course->tasks->count() * 100) : 0;

                return $course;
            });

        $events = collect($courses_alltime)->map(function ($course) {
            return $course->tasks;
        })->flatten()->all();
        $events = collect($events)->map(function ($event) {
            return \Calendar::event(
                $event->course->name . ' - ' . $event->title, //event title
                true, //full day event?
                $event->created_at->format('Y-m-d'), //start time (you can also use Carbon instead of DateTime)
                $event->max_date_upload, //end time (you can also use Carbon instead of DateTime)
                0, //optionally, you can specify an event ID
                [
                    'backgroundColor' => $this->getColor($event),
                    'borderColor' => $this->getColor($event),
                    'url' => route('student.task.show', ['task' => $event->id]),
                ]
            );

        });

        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'themeSystem' => 'bootstrap',
                'height' => '100%',
                'locale' => 'id',
                'selectable' => true,
                'initialView' => 'dayGridMonth',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth listWeek'
                ],
                'buttonText' => [
                    'today' => 'Hari ini',
                    'month' => 'Bulanan',
                    'week' => 'Mingguan',
                    'day' => 'Harian',
                ],
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('pages.student.task.index', compact('courses', 'date', 'calendar', 'all_tasks'));
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
