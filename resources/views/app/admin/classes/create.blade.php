@extends('adminlte::page')

@section('title', 'Class | Create')

@section('content_header')
    <h1>Class: New</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('app.admin.classes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="user_id">Teacher Adviser:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select Teacher Adviser</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="level">Level:</label>
                <input type="text" name="level" id="level" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="School_year">School year:</label>
                <input type="text" name="School_year" id="School_year" class="form-control" required>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('app.admin.classes.index')}}" type="button" class="btn btn-default float-right">Cancel</a>
            </div>
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
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
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
