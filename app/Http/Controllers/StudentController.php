<?php

namespace App\Http\Controllers;

use App\Practice;
use App\PracticeMember;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function __construct (Practice $practice, PracticeMember $practiceMember) {
        $this->practice = $practice;
        $this->practiceMember = $practiceMember;
    }
    //
    public function dashboard () {
        $student = \Auth::user()->student;

        $practices = $this->practiceMember
            ->where('student_id', $student->id)
            ->get()
            ->map(function ($pm) {
                return $pm->practice;
            });

        return view('pages.student.dashboard', compact('practices'));
    }
}
