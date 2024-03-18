@extends('adminlte::page')

@section('title', 'Events | Modify')

@section('content_header')
    <h1>Events: Modify</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{ route('app.admin.classes.update', $upcomingClass) }}">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <h3 class="card-title">Modify Events</h3>
                        <div class="card-tools">
                            <a href="{{ route('app.admin.classes.index') }}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="#">ID</label>
                            <input type="text" name="id" class="form-control" 
                                value="{{ $upcomingClass->id }}"
                                placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="#">Name</label>
                            <input type="text" name="name" class="form-control" 
                                value="{{ $upcomingClass->name }}"
                                placeholder="Enter events name">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                <input type="text" name="date" id="date" class="form-control datetimepicker-input" value="{{ $upcomingClass->date }}" data-target="#datepicker" required/>
                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('date')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <button type="reset" class="btn btn-default"> Clear</button>
                        <button type="submit" class="btn btn-primary float-right"> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Include Bootstrap Datepicker CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@stop

@section('js')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap Datepicker JavaScript file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Initialize Datepicker
        $(document).ready(function(){
            $('#date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
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
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            });
        });
    </script>
@stop
