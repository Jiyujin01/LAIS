@extends('adminlte::page')

@section('title', 'Class')

@section('content_header')
@section('content_header')
    <h1>Class: {{ $students->first()->course->name }} - {{ $students->first()->course->level }}</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible auto-close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Student Login List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.classes.index') }}" class="btn btn-primary btn-sm">Export File</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Student ID</th>
                        <th width="20%">Name</th>
                        <th>Teacher</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->getFullname() }}</td>
                            <td>{{ $student->course->user->getUname() }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->course->level }}</td>
                            <td>{{ $student->checkinout->Getstate() }}</td>
                            <td><a href="{{route('app.admin.classes.view',$student)}}" class="btn btn-warning"><i class="fas fa-eye "></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

@stop

@section('footer')
    Copyright &copy; 2024. <strong>Learners Attendance Information System</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
