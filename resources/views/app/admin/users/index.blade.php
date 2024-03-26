@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Manage Users</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
            <div class="card-tools">
                <a href="{{ route('app.admin.users.create') }}" class="btn btn-primary btn-sm">Add New User</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible auto-close">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->getLevel() }}</td>
                                <td>
                                    <span class="badge badge-{{ $user->role->getStatus() === 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($user->role->getStatus()) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('app.admin.users.reset', $user) }}" class="btn btn-sm btn-primary" title="Reset Password"><i class="fas fa-key"></i></a>
                                    <a href="{{ route('app.admin.users.modify', $user) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('app.admin.users.delete', $user) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $users->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy; {{ date('Y') }}. <a href="/admin">Learners Attendance Information System</a>. All rights reserved.
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
