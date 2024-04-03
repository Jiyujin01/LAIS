@extends('adminlte::page')

@section('title', 'Classes')

@section('content_header')
<div class="row">
    <div class="col-sm-4"><h1>Classes</h1></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><div class="float-right" id="live-clock"></div></div>
</div>
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
            <h3 class="card-title">Class List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.classes.create') }}" class="btn btn-primary btn-sm">New Class</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($courses as $course)
                    <?php 
                        $totalStudents = $course->students()->count();
                        $studentsState1 = $course->students()->whereHas('checkinout', function ($query) {
                            $query->where('state', 1)
                            ->whereDate('created_at', now()->toDateString());
                        })->count();
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title">{{ $course->name }}- {{ $course->level }}</h4>
                                <br>
                                <br>
                                <p class="card-text">Teacher Adviser: {{ $course->user->getUname() }}</p>
                                <p class="card-text">Total Students: {{ $totalStudents }}</p>
                                <p class="card-text">No of Student LogIned: {{ $studentsState1 }}</p>
                                <a href="{{ route('app.admin.classes.show', $course->id) }}" class="btn btn-info  btn-sm"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('app.admin.classes.modify', $course->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Modify</a>
                                <form method="post" action="{{ route('app.admin.classes.destroy', $course->id) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the live clock every second
            function updateClock() {
                var now = new Date();
                var day = now.getDate();
                var month = now.getMonth() + 1;
                var year = now.getFullYear();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var dateString = day + '/' + month + '/' + year;
                var timeString = hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                $('#live-clock').html('<span>' + dateString + ' ' + timeString + '</span>');
            }

            // Initial call to update the clock
            updateClock();

            // Update the clock every second
            setInterval(updateClock, 1000);
        });
    </script>
@stop
