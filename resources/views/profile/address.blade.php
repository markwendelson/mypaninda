@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Shipping Address'])

<div class="container pb-5 mb-4">
    @include('partials.message')

    <div class="table-responsive font-size-sm">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Default</th>
                </tr>
            </thead>
            <tbody>
            @foreach($addresses as $address)
                <tr>
                    <td><a href="{{ route('addresses.index') }}">{{ $address->first_name .' ' .$address->last_name }}</a></td>
                    <td>{{ $address->email }}</td>
                    <td>{{ $address->phone }}</td>
                    <td>{{ $address->province }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ ($address->is_default == 1 ? 'Yes' : 'No') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <br><hr><br>
    <form class="row" action="{{ route('addresses.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="first-name">First Name *</label>
                <input type="text" class="form-control" id="first-name" name="first_name" value="{{ old('first_name', $address->first_name ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="last-name">Last Name *</label>
                <input type="text" class="form-control" id="last-name" name="last_name" value="{{ old('last_name', $address->last_name ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $address->email ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $address->phone ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address-line1">Address Line1 *</label>
                <input type="text" class="form-control" id="address-line1" name="address_line1" value="{{ old('address_line1', $address->address_line1 ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address-line2">Address Line2</label>
                <input type="text" class="form-control" id="address-line2" name="address_line2" value="{{ old('address_line2', $address->address_line2 ?? '') }}" maxlength="255">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="province">Province *</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ old('province', $address->province ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">City *</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $address->city ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="postal-code">Postal *</label>
                <input type="text" class="form-control" id="postal-code" name="postal_code" value="{{ old('postal_code', $address->postal_code ?? '') }}" maxlength="255" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="landmark">Landmark</label>
                <input type="text" class="form-control" id="landmark" name="landmark" value="{{ old('landmark', $address->landmark ?? '') }}" maxlength="255">
            </div>
        </div>

        <div class="col-12">
            <hr class="mt-2 mb-3">
            <button class="btn btn-primary" type="submit">Update Default Shipping Address</button>
        </div>
    </form>
</div>
@endsection
