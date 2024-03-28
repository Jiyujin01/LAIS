<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::all();

        return view('app.admin.classes.index', compact('courses'));
    }


    public function create()
    {
        return view('app.admin.classes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:course',
            'user_id' => 'required|int',
            'level' => 'required',
            'School_year' => 'required'
        ]);

        $course = Course::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'level' => $data($data['level']),
            'School_year' => $data($data['School_year']),
        ]);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully added!');
    }

    public function destroy(Course $course)
    {
        $courses->delete();

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully deleted!');
    }

    public function modify(Course $course)
    {
        return view('app.admin.classes.modify', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255|unique:courses,name,' . $course->id,
            'date' => 'required|date',
            'user_id' => 'required|int',
            'level' => 'required|int',
            'School_year' => 'required|int'
        ]);

        $course->update($data);

        return redirect()->route('app.admin.classes.index')->with('status', 'Class has been successfully updated!');
    }


    public function show($id)
    {
        $course = Course::find($id);
    
        if (!$course) {
            // Handle case where course is not found
            $course = Course::findOrFail($id);
            $students = $course->students;
            return view('app.admin.classes.show', compact('students'));
        }
    
        $students = $course->students;
    
        return view('app.admin.classes.show', compact('students'));
    }

    public function view(Student $student)
    {
        return view('app.admin.classes.view', compact('student'));
    }

    public function print(Request $request)
    {
        $studentIds = $request->input('students');
    $students = Student::whereIn('id', $studentIds)->get();
        // Process printing logic here

        return view('app.admin.classes.print', compact('students'));
    }
    
}
