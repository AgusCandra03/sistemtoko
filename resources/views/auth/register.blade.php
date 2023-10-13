@extends('layouts.app')

@section('content')
<div id="App">
    <div class="row">
        <div class="col-lg-6 right">
            <img src="{{ asset('assets/img/login-img.png') }}" alt="Login Image">
            <h5>Manage your work more easily and quickly.</h5>
        </div>
        <div class="col-lg-6 left">
            <div class="header-form">
                <h2>Register</h2>
                <p>Create new account with your information.</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label for="name">Fullname</label>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label for="email">Email</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                    <label for="password">Password</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">Retype Password</label>
                </div>

                <button type="submit" class="form-control btn btn-primary">Register</button>

                <p class="mb-0 linked">
                    Have an account ? <a href="{{ url('login') }}" class="text-center">Sign In here!</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection