@extends('layouts.auth')

@section('title')
Login Form
@endsection

@section('content')
<div class="login-logo">
    <img src="{{asset('/img/irosin.png')}}" height="200"><br>
    <a href="{{url('/')}}" class="text-lg"><strong>{{ config('app.name', 'Laravel') }}</strong></a>
</div>
@if (session('error'))
<div class="alert-danger text-center p-2">{{ session('error') }}</div>
@endif
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            <div class="input-group mt-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            <div class="row mt-3">
                <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                    Remember Me
                    </label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-sign-in-alt" aria-hidden="true"></i> {{ __('Login') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <p class="mb-1">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">I forgot my password</a>
        @endif
        </p>
        <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection