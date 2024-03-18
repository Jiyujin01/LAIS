<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stratum;

class StratumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stratum = Stratum::all();

        return view('app.admin.classes.index', compact('stratum'));
    }

    public function create()
    {
        return view('app.admin.classes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:stratum',
            'user_id' => 'required|int',
            'level' => 'required',
            'School_year' => 'required'
        ]);

        $stratum = Stratum::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'level' => $data($data['level']),
            'School_year' => $data($data['School_year']),
        ]);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully added!');
    }

    public function destroy(Stratum $stratum)
    {
        $upcomingClass->delete();

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully deleted!');
    }

    public function modify(Stratum $stratum)
    {
        return view('app.admin.classes.modify', compact('stratum'));
    }

    public function update(Request $request, Stratum $stratum)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:stratums,name,' . $stratum->id,
            'date' => 'required|date',
            'user_id' => 'required|int',
            'level' => 'required|int',
            'School_year' => 'required|int'
        ]);

        $stratum->update($data);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully updated!');
    }
}
