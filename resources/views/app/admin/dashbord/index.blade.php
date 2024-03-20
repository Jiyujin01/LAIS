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
            <h3 class="card-title">Student LogIn List</h3>
            <div class="card-tools">
            <a href="" class="btn btn-primary btn-sm">Veiw Class</a>
            </div>
        </div>

        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>          
                                <th width="10%">Student ID</th>
                                <th width="20%">Name</th>
                                <th>Teacher</th>
                                <th>CLass</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stratum as $strata)
                            <tr>
                                <td>{{ $strata->student->id }}</td>
                                <td>{{ $strata->student->getFullname()}}</td>
                                
                                <td>
                                {{ $strata->user->getUname()}}
                                </td>
                    
                                <td>
                                {{ $strata->name }}
                                </td>

                                <td>
                                {{ $strata->level }}
                                </td>

                                <td>
                                {{ $strata->student->checkinout->Getstate() }}
                                </td>

                                <td>
                                    
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



