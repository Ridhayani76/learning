<?php

namespace App\Http\Controllers;

use App\Practice;
use App\Skill;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    //
    function __construct (Practice $practice) {
        $this->practice = $practice;
    }

    public function index () {
        $practices = $this->practice->orderBy('created_at', 'desc')->get();

        return view('pages.teacher.practice.index', compact('practices'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'skill_id' => 'required',
            'agency_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $practice = $this->practice->create([
            'agency_id' => $request->agency_id,
            'skill_id' => $request->skill_id,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('teacher.practice.show', ['practice' => $practice->id]);
    }

    public function show ($id) {
        $practice = $this->practice->find($id);

        return view('pages.teacher.practice.show', compact('practice'));
    }
}
