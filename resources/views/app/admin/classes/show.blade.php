@extends('adminlte::page')

@section('title', 'Class')

@section('content_header')
    <div class="row">
        <div class="col-sm-12 col-md-4"><h1>Class: {{ $students->first()->course->name }} - {{ $students->first()->course->level }}</h1></div>
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4"><div class="float-right" id="live-clock"></div></div>
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
                <form method="POST" action="{{ route('app.admin.classes.print') }}">
                    @csrf
                    @foreach($students as $student)
                        <input type="hidden" name="students[]" value="{{ $student->id }}">
                    @endforeach
                    <button type="submit" class="btn btn-primary btn-sm">Print Report</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10%">Student ID</th>
                            <th width="20%">Name</th>
                            <th>Teacher</th>
                            <th>Class</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th width="5%">Action</th>
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
                                <td>
                                @foreach($student->checkinout->sortByDesc('created_at') as $checkinout)
                                    @if($checkinout->created_at->isToday())
                                        @php
                                            $latestCheckinout = $checkinout;
                                            break; // Break the loop after finding the most recent data
                                        @endphp
                                    @endif
                                @endforeach

                                @if(isset($latestCheckinout))
                                    @if($latestCheckinout->Getstate() == 1)
                                        <span class="dot dot-green"></span> LogIn
                                    @elseif($latestCheckinout->Getstate() == 0)
                                        <span class="dot dot-green"></span> LogOut
                                    @elseif($latestCheckinout->Getstate() == 2)
                                        <span class="dot dot-black"></span> Absent
                                    @else
                                        <span class="dot dot-red"></span> Late/Cutting
                                    @endif
                                @endif
                                </td>
                                <td><a href="{{route('app.admin.classes.view',$student)}}" class="btn btn-warning"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
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
