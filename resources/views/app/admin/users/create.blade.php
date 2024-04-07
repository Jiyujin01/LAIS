@extends('adminlte::page')

@section('title', 'Users -> Add new user')

@section('content_header')
    <h1>Users -> Add New User</h1>
@stop

@section('content')
    <div class="card">
        <form method="post" action="{{route('app.admin.users.store')}}">
            @csrf 
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="suffix">Suffix:</label>
                <input type="text" name="suffix" id="suffix" class="form-control" required>
            </div>
                
                </div>
                <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                    <option value="Other">Other</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                    <div class="form-group">
                    <label for="level">User Level</label>
                    <select name="level" class="form-control @error('level') is-invalid @enderror" id="level" value="{{old('level')}}">
                        <option value="">--- please select ----</option>
                        <option value="0" {{old('level') == 0 ? "selected" : ""}}>Staff</option>
                        <option value="1" {{old('level') == 1 ? "selected" : ""}}>Administrator</option>
                    </select>
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Default Password</label>
                    <input type="text" name="password" class="form-control" value="P@ssw0rd" readonly>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('app.admin.users.index')}}" type="button" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
@stop

@section('footer')
    Copyright &copy 2023. <a href='/admin'>CHarles's Blog</a>. All rights reserved.
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop