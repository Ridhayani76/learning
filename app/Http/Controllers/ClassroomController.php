<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //
    function __construct (Classroom $classroom) {
        $this->classroom = $classroom;
    }

    public function index () {
        $classrooms = $this->classroom->orderBy('name', 'asc')->get();

        return view('pages.classroom.index', compact('classrooms'));
    }
}
