@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Shipping Address'])

<div class="container pb-5 mb-4">
    @include('partials.message')

    <form id="destroy-address" action="{{ route('addresses.destroy') }}" method="POST" style="display: none;">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $address->id }}">
    </form>

    <form class="row" action="{{ route('addresses.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $address->id }}">
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
        <div class="col-md-6">
            <div class="form-group">
                <label for="landmark">Set As Default</label>
                <select name="is_default" class="form-control">
                    <option value="0"{{ $address->is_default == 0 ? 'selected' : ''}}>No</option>
                    <option value="1"{{ $address->is_default == 1 ? 'selected' : ''}}>Yes</option>
                </select>
            </div>
        </div>

        <div class="col-12">
            <hr class="mt-2 mb-3">
            <button class="btn btn-primary" type="submit">Update Shipping Address</button>
            <a class="btn btn-danger" href="{{ route('addresses.destroy') }}" 
                onclick="event.preventDefault(); document.getElementById('destroy-address').submit();">Delete Shipping Address</a>
        </div>
    </form>
</div>
@endsection
