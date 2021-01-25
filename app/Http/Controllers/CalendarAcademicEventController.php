<?php

namespace App\Http\Controllers;

use App\CalendarAcademic;
use App\CalendarAcademicEvent;
use Illuminate\Http\Request;

class CalendarAcademicEventController extends Controller
{
    //
    function __construct (CalendarAcademic $calendarAcademic, CalendarAcademicEvent $calendarAcademicEvent) {
        $this->calendarAcademic = $calendarAcademic;
        $this->calendarAcademicEvent = $calendarAcademicEvent;
    }

    public function store (Request $request) {
        $this->validate($request, [
            'semester' => 'required',
            'year' => 'required',
            'start' => 'required',
            'end' => 'required',
            'event' => 'required|string',
        ]);

        // find calendar academic
        $calendarAcademic = $this->calendarAcademic->where('year', $request->year)->where('semester', $request->semester)->first();
        if (!$calendarAcademic)
            $calendarAcademic = $this->calendarAcademic->create([
                'semester' => $request->semester,
                'year' => $request->year,
            ]);

        $this->calendarAcademicEvent->create([
            'event' => $request->event,
            'calendar_academic_id' => $calendarAcademic->id,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->back()->with('message', 'Kegiatan berhasil ditambahkan');
    }
}
