<?php

namespace App\Http\Controllers;

use App\PracticeMember;
use App\Student;
use Illuminate\Http\Request;

class PracticeMemberController extends Controller
{
    function __construct (PracticeMember $member) {
        $this->item = $member;
    }
    //
    public function store (Request $request) {
        $this->validate($request, [
            'practice_id' => 'required',
            'student_id' => 'required',
            'semester' => 'required',
        ]);

        $member = $this->item->create([
            'practice_id' => $request->practice_id,
            'student_id' => $request->student_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('teacher.practice.show', ['practice' => $request->practice_id]);
    }
}
