@extends('adminlte::page')

@section('title', 'Students | Create')

@section('content_header')
    <h1>Students: Create Student</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('app.admin.students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="course_id">Class:</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">Select Class</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->level }}-{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" id="lname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mname">Middle Name:</label>
                <input type="text" name="mname" id="mname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="suffix">Suffix:</label>
                <input type="text" name="suffix" id="suffix" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

@stop

@section('footer')
    Copyright &copy; 2024. <strong>cbrj Admin</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Your JavaScript logic here, if any
    });
</script>
@stop
