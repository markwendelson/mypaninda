@extends('layouts.app')

@section('content')
<div class="container pb-5 mb-sm-4">
@include('partials.message')

    <div class="row pt-5">
        <div class="col-md-6 pt-sm-3">
            <div class="card">
                <div class="card-body">
                <h2 class="h4 mb-1">Sign in</h2>
                <h3 class="h6 font-weight-semibold opacity-70 pt-4 pb-2">Enter your email and password.</h3>
                <form method="POST" action="{{ route('login') }}">
                 @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i data-feather="mail"></i></span></div>
                        <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="Email" maxlength="255" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i data-feather="lock"></i></span></div>
                        <input class="form-control" name="password" type="password" placeholder="Password" maxlength="255" required>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="remember_me">
                            <label class="custom-control-label" for="remember_me">Remember me</label>
                        </div><a class="nav-link-inline font-size-sm" href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <hr class="mt-4">
                    <div class="text-right pt-4">
                        <button class="btn btn-primary" type="submit">Sign In</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 pt-5 pt-sm-3">
            <h2 class="h4 mb-3">No account? Sign up</h2>
            <p class="text-muted mb-4">Registration takes less than a minute but gives you full control over your orders.</p>
            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" maxlength="255" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">E-mail Address *</label>
                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" maxlength="255" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input class="form-control" type="password" id="password" name="password" maxlength="255" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password-confirmation">Confirm Password *</label>
                            <input class="form-control" type="password" id="password-confirmation" name="password_confirmation" maxlength="255" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="terms" required>
                      <label class="custom-control-label" for="terms">Agree to terms and conditions</label>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
