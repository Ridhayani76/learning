<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    //
    function __construct (Agency $agency) {
        $this->agency = $agency;
    }

    public function index () {
        $agencies = $this->agency->orderBy('name', 'asc')->get();

        return view('pages.teacher.agency.index', compact('agencies'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $this->agency->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('message', 'Tempat praktik berhasil dibuat.');
    }
}
