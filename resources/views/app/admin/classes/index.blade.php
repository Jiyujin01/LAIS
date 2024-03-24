@extends('adminlte::page')

@section('title', 'Classes')

@section('content_header')
    <h1>Classes</h1>
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
                <a href="{{ route('app.admin.classes.create') }}" class="btn btn-primary btn-sm">New Class</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($course as $courses)
                    <div class="col-md">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th>Name</th>
                                    <th>Teacher Adviser</th>
                                    <th>Grade Level</th>
                                    <th>School Year</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $courses->id }}</td>
                                    <td>{{ $courses->name }}</td>
                                    <td>{{ $courses->user->getUname() }}</td> 
                                    <td>{{ $courses->level }}</td>    
                                    <td>{{ $courses->School_year }}</td>                
                                    <td>
                                    <a href="{{ route('app.admin.classes.show', $courses->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <form method="post" action="{{ route('app.admin.classes.destroy', $courses->id) }}"> 
                                            <a href="{{ route('app.admin.classes.modify', $courses->id) }}" class="btn btn-warning btn-sm">Modify <span class="fas fa-edit"></span></a>
                                            @csrf 
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy; 2024. <strong>Web-Based_ID_Entry</strong>. All rights reserved.
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
