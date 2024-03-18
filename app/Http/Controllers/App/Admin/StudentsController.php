<?php

namespace App\Http\Controllers\App\Admin;
use App\Models\Classes as StudentClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Class;
class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $student = Student::all();

        return view('app.admin.students.index', compact('student'));
    }

    public function create()
    {
        return view('app.admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'class' => 'required|min:4|max:255',
            'fname' => 'required|min:2|max:255',
            'lname' => 'required|min:2|max:255',
            'gender' => 'required|in:Male,Female,Other'
        ]);

        $student = Student::create($data);

        return redirect()->route('app.admin.students.index')->with('status', 'Student has been successfully added!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('app.admin.students.index')->with('status', 'Student has been successfully deleted!');
    }

    public function edit(Student $student)
    {
        return view('app.admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'class' => 'required|min:4|max:255',
            'fname' => 'required|min:2|max:255',
            'lname' => 'required|min:2|max:255',
            'gender' => 'required|in:Male,Female,Other'
        ]);

        $student->update($data);

        return redirect()->route('app.admin.students.index')->with('status', 'Student has been successfully updated!');
    }
}
