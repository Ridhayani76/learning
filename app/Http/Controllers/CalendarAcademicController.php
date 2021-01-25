<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\CalendarAcademic;
use Illuminate\Http\Request;

class CalendarAcademicController extends Controller
{
    //
    function __construct (CalendarAcademic $calendarAcademic) {
        $this->calendarAcademic = $calendarAcademic;
    }

    public function getColor ($calendar) {
        if ($calendar->semester == 'Genap') {
            return "#e1d8cf";
        } elseif ($calendar->semester == 'Ganjil') {
            return "#75ca9b";
        } elseif ($calendar->semester == 'Khusus') {
            return "#2B7D75";
        }
    }

    public function index (Request $request) {
        $year = $request->year ? $request->year : date('Y');
        $calendars = $this->calendarAcademic->where('year', $year)->get();

        $events = $calendars->map(function ($calendar) {
            return $calendar->events;
        })->flatten()->all();

        $events = collect($events)->map(function ($event) {
            return \Calendar::event(
                $event->event, //event title
                true, //full day event?
                $event->start, //start time (you can also use Carbon instead of DateTime)
                $event->end, //end time (you can also use Carbon instead of DateTime)
                0, //optionally, you can specify an event ID
                [
                    'backgroundColor' => $event->end > date('Y-m-d') ? '#75ca9b' : '#e1d8cf',
                    'borderColor' => $event->end > date('Y-m-d') ? '#75ca9b' : '#e1d8cf',
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

        return view('pages.calendar-academic.index', compact('calendars', 'calendar', 'year'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'semester' => 'required|unique:classrooms,name',
            'start' => 'required',
            'end' => 'required',
            'event' => 'required|string',
        ]);

        $this->classroom->create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('message', 'Kelas berhasil ditambahkan');
    }
}
