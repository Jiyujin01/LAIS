@extends('adminlte::page')

@section('title', 'Students')

@section('content_header')
    <h1>Students</h1>
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
            <h3 class="card-title">List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.students.create') }}" class="btn btn-primary btn-sm">New Student</a>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>  
                        <th>ID</th>
                        <th>Class</th> <!-- New column for Class -->
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Suffix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->course->name}}</td> 
                        <td>{{ $student->fname }}</td>
                        <td>{{ $student->mname }}</td>
                        <td>{{ $student->lname }}</td>                     
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->suffix }}</td>
                        <td>
                            <!-- Add actions here -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
@stop

@section('footer')
    Copyright &copy; 2024. <strong>Learners Attendance Information System</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        /* Custom CSS for mobile responsiveness */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 5,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
@stop
