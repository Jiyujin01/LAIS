<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UpcomingClass;

class ClassManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $upcomingClasses = UpcomingClass::all();

        return view('app.admin.classes.index', compact('upcomingClasses'));
    }

    public function create()
    {
        return view('app.admin.classes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:upcoming_classes',
            'date' => 'required|date'
        ]);

        $upcomingClass = UpcomingClass::create($data);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully added!');
    }

    public function destroy(UpcomingClass $upcomingClass)
    {
        $upcomingClass->delete();

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully deleted!');
    }

    public function modify(UpcomingClass $upcomingClass)
    {
        return view('app.admin.classes.modify', compact('upcomingClass'));
    }

    public function update(Request $request, UpcomingClass $upcomingClass)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:upcoming_classes,name,' . $upcomingClass->id,
            'date' => 'required|date'
        ]);

        $upcomingClass->update($data);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully updated!');
    }
}
