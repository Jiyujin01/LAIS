@extends('layouts.app')

@section('content')

<style>
        .card-body
            {
			-moz-animation: reveal-banner 1s 0.25s ease-in-out;
			-webkit-animation: reveal-banner 1s 0.25s ease-in-out;
			-ms-animation: reveal-banner 1s 0.25s ease-in-out;
			animation: reveal-banner 1s 0.25s ease-in-out;
			-moz-animation-fill-mode: forwards;
			-webkit-animation-fill-mode: forwards;
			-ms-animation-fill-mode: forwards;
			animation-fill-mode: forwards;
			background: rgba(27, 52, 46, 0.5);
			display: inline-block;
		}

        
        </style>
<section id= "try">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card bg-dark text-white">
                <div class="card-header"> <h5 id="logo" style="display: flex; align-items: center;">
				 <span style=" margin-left: 5px;"> {{ __('Login') }} </span> </h5></div> 

                <div class="card-body">
                
                <!--image
                <div class="text-center mb-4">
                        <img src="img/icon.ico" class="img-fluid" style="width: 20%;" alt="Placeholder Image">
                    </div> 
                -->
                <br>
                <div class="text-center mb-4">
                        <h2 style="font-family: 'Bookman Old Style', Times, serif;">Learners Attendance Information System</h2>
                    </div>
                <br>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-white text-black" name="email" value="{{ old('email') }}" required autocomplete="email" style='color:white' placeholder="Email Address" style="color: white;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                           
                            <div class="col-md-6 offset-md-4">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-light text-black" name="password" required autocomplete="current-password" placeholder="Password" style="color: black;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit"  class="btn btn-primary " >
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection

@section('css')
    
@stop
