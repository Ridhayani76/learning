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

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:classrooms,name',
        ]);

        $this->classroom->create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('message', 'Kelas berhasil ditambahkan');
    }
}
