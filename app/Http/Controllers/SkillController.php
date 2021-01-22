<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    function __construct (Skill $skill) {
        $this->skill = $skill;
    }

    public function index () {
        $skills = $this->skill->orderBy('name', 'asc')->get();

        return view('pages.teacher.skill.index', compact('skills'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $this->skill->create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('message', 'Tempat praktik berhasil dibuat.');
    }
}
