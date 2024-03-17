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
                <a href="{{ route('app.admin.classes.create') }}" class="btn btn-primary btn-sm">New Class</a>
            </div>
        </div>
<!---
        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>  
                            <th width="20%">Image</th>          
                                <th width="10%">ID</th>
                                <th>Name</th>
                                <th>Teacher</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upcomingClasses as $class)
                            <tr>
                                <td>{{ $class->id }}</td>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->date }}</td>                     
                                <td>
                                    <form method="post" action="{{ route('app.admin.classes.destroy', $class->id) }}"> 
                                        <a href="{{ route('app.admin.classes.modify', $class->id) }}" class="btn btn-warning btn-sm">Modify <span class="fas fa-edit"></span></a>
                                        @csrf 
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('This will delete the entry!\nAre you sure?')" class="btn btn-danger btn-sm">Delete <span class="fas fa-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                        
                        </tfoot>
                    </table>
                </tfoot>
            </table>
        </div>
-->
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



