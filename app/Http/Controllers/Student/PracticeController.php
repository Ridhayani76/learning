<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    //
    function __construct (Practice $practice) {
        $this->practice = $practice;
    }

    public function index () {
        $practices = $this->practice->orderBy('created_at', 'desc')->get()->filter(function ($practice) {
            return $practice->members()->where('student_id', auth()->user()->student->id)->first();
        });

        return view('pages.student.practice.index', compact('practices'));
    }

    public function show ($id) {
        $practice = $this->practice->find($id);

        return view('pages.student.practice.show', compact('practice'));
    }
}
