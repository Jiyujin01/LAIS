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
            <h3 class="card-title">List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.students.create') }}" class="btn btn-primary btn-sm">New Student</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>  
                        <th>ID</th>
                        <th>Class</th> <!-- New column for Class -->
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $students)
                    <tr>
                        <td>{{ $students->id }}</td>
                        <td>{{ $students->class }}</td> <!-- Displaying Class -->
                        <td>{{ $students->fname }}</td>
                        <td>{{ $students->lname }}</td>                     
                        <td>{{ $students->gender }}</td>
                        <td>
                            <form method="post" action="{{ route('app.admin.students.destroy', $students->id) }}"> 
                                <a href="{{ route('app.admin.students.edit', $students->id) }}" class="btn btn-warning btn-sm">Edit <span class="fas fa-edit"></span></a>
                                @csrf 
                                @method('delete')
                                <button type="submit" onclick="return confirm('This will delete the student!\nAre you sure?')" class="btn btn-danger btn-sm">Delete <span class="fas fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
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
