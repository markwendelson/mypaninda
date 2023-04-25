@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Password Reset'])

<div class="container pb-5 mb-4">
    @include('partials.message')
    
    <form class="row" action="{{ route('profiles.reset') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="old-password">Old Password *</label>
                <input type="password" id="old-password" name="old_password" class="form-control" 
                    value="" maxlength="255" autofocus required>
            </div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">New Password *</label>
                <input type="password" id="password" name="password" class="form-control" 
                    value="" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password-confirmation">Confirm Password *</label>
                <input class="form-control" type="password" id="password-confirmation" name="password_confirmation" maxlength="255" required>
            </div>
        </div>
        <div class="col-12">
            <hr class="mt-2 mb-3">
            <button class="btn btn-primary" type="submit">Update Password</button>
        </div>
    </form>
</div>
@endsection
