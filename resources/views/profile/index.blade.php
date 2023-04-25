@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Profile Update'])

<div class="container pb-5 mb-4">
    @include('partials.message')
    
    <form class="row" action="{{ route('profiles.update') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="gender">Gender *</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male"{{ ('male' == old('gender', $user->gender)) ? ' selected' : '' }}>Male</option>
                    <option value="female"{{ ('female' == old('gender', $user->gender)) ? ' selected' : '' }}>Female</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-12">
            <hr class="mt-2 mb-3">
            <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
    </form>
</div>
@endsection
