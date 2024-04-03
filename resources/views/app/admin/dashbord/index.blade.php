@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-12 col-md-4"><h1>Dashboard</h1></div>
    <div class="col-12 col-md-4"></div>
    <div class="col-12 col-md-4"><div class="float-right" id="live-clock"></div></div>
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
            <h3 class="card-title">Student Login List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.classes.index') }}" class="btn btn-primary btn-sm">View Classes</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
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
                            @foreach($student->checkinout as $checkinout)
                                @if ($checkinout->created_at->isToday())
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->getFullname() }}</td>
                                        <td>{{ $student->course->user->getUname() }}</td>
                                        <td>{{ $student->course->name }}</td>
                                        <td>{{ $student->course->level }}</td>
                                        <td>
                                        @if($checkinout->Getstate() == 1)
                                                <span class="dot dot-green"></span> LogIn
                                            @elseif($checkinout->Getstate() == 0)
                                                <span class="dot dot-green"></span> LogOut
                                            @elseif($checkinout->Getstate() == 2)
                                                <span class="dot dot-black"></span> Absent
                                            @else
                                                <span class="dot dot-red"></span> Late/Cutting
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
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
    </div>
@stop

@section('footer')
    Copyright &copy; 2024. <strong>Learners Attendance Information System</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .dot {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
        }
        .dot-green {
            background-color: green;
        }

        .dot-red{
            background-color: red;
        }

        .dot-black{
            background-color: black;
        }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the live clock every second
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var day = now.getDate();
                var month = now.getMonth() + 1;
                var year = now.getFullYear();
                var timeString = hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
                var dateString = day + '/' + month + '/' + year;
                $('#live-clock').html('<span>' + dateString + ' ' + timeString + '</span>');
            }

            // Initial call to update the clock
            updateClock();

            // Update the clock every second
            setInterval(updateClock, 1000);
        });
    </script>
@stop
