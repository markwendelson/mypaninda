@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Account Upgrade'])

<div class="container pb-5 mb-4">
    @include('partials.message')

    @if (Auth::user()->type == 'seller')
    <div class="alert alert-info" role="alert">
        Your account is already in business state. There is no further action needed here.
    </div>
    @else
    <form class="row" action="{{ route('profiles.request-upgrade') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="sponsor-id">Sponsor*</label>
                <select id="sponsor-id" name="sponsor_id" class="form-control">
                <option value="0">--- NO SPONSOR ---</option>
                    @foreach ($sponsors as $sponsor)
                    <option value="{{ $sponsor->id }}"{{ ($sponsor->id == old('sponsor_id')) ? ' selected' : '' }}>
                        {{ Str::title($sponsor->name) }} - ({{ $sponsor->username}})
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="payment">Proof of Upgrade Payment (Photo)</label>
                <input type="file" id="payment" name="payment" class="form-control" 
                    value=""  accept="image/*">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label for="payment">Proof of Identity (Government ID) *</label>
                <input type="file" id="payment" name="payment" class="form-control" 
                    value=""  accept="image/*" required>
            </div>
        </div> -->
        <div class="col-12">
            <hr class="mt-2 mb-3">
            <button class="btn btn-primary" type="submit">Submit Request</button>
        </div>
    </form>
    @endif

    <br>

    <div class="table-responsive font-size-sm">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Requested At</th>
                    <th>Sponsor</th>
                    <th>Notes</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($history as $item)
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ Str::title($item->sponsor->name) }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>{{ Str::title($item->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
