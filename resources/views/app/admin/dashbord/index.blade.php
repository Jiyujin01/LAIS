@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
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
                <a href="{{ route('app.admin.classes.index') }}" class="btn btn-primary btn-sm">View Classes</a>
            </div>
        </div>

        <div class="card-body">
            <table id="student_table" class="table table-bordered table-striped">
                <thead>
                    <tr>          
                        <th width="10%">Student ID</th>
                        <th width="20%">Name</th>
                        <th>Teacher</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>Status</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="{{ $students->previousPageUrl() }}">&laquo;</a></li>
                    @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                        <li class="page-item {{ ($students->currentPage() == $page) ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endforeach
                    <li class="page-item"><a class="page-link" href="{{ $students->nextPageUrl() }}">&raquo;</a></li>
                </ul>
            </div>
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
    <script>
        $(document).ready(function() {
            $('#student_table').DataTable();
        });
    </script>
@stop
