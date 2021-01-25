<?php

namespace App\Http\Controllers;

use App\CalendarAcademic;
use Illuminate\Http\Request;

class CalendarAcademicController extends Controller
{
    //
    function __construct (CalendarAcademic $calendarAcademic) {
        $this->calendarAcademic = $calendarAcademic;
    }

    public function index (Request $request) {
        $year = $request->year ? $request->year : date('Y');
        $calendars = $this->calendarAcademic->where('year', $year)->get();

        return view('pages.calendar-academic.index', compact('calendars', 'year'));
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
