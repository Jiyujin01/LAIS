<?php

namespace App\http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $students = Student::paginate(45);
        return view('app.admin.dashbord.index', compact('students'));
    }

    public function show($id)
    {
        $course = Course::find($id);
    
        if (!$course) {
            // Handle case where course is not found
        }
    
        $students = $course->students;
    
        return view('app.admin.classes.show', compact('students'));
    }


}