<?php

namespace App\Http\Controllers\App\Admin;
use App\Models\Classes as StudentClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Level;
class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::paginate(10);

        return view('app.admin.students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('app.admin.students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' =>  'required',
            'fname' => 'required|min:2|max:255',
            'mname' => 'required|min:2|max:255',
            'lname' => 'required|min:2|max:255',
            'suffix' => 'required|min:1|max:255',
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
            'course_id' => 'required',
            'fname' => 'required|min:2|max:255',
            'mname' => 'required|min:2|max:255',
            'lname' => 'required|min:2|max:255',
            'suffix' => 'required|min:1|max:255',
            'gender' => 'required|in:Male,Female,Other'
        ]);

        $student->update($data);

        return redirect()->route('app.admin.students.index')->with('status', 'Student has been successfully updated!');
    }

}
