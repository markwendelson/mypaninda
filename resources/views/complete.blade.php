@extends('layouts.app')

@section('content')
  <div class="container pb-5 mb-sm-4">
      <div class="pt-5">
        <div class="card py-3 mt-sm-3">
          <div class="card-body text-center">
            <h3 class="h4 pb-3">Thank you for your order!</h3>
            <p class="mb-2">Your order # {{ $order->id }} has been placed and will be processed as soon as possible.</p>
            <p class="mb-2">Make sure you make note of your payment code, which is <strong>{{ $order->payment_code }}</strong>.</p>
            {{-- <p>You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p> --}}
            <a class="btn btn-secondary mt-3 mr-3" href="{{ route('home') }}">Go back shopping</a>
            <a class="btn btn-primary mt-3" href="{{ route('orders.show', $order->id) }}"><i data-feather="map-pin"></i>&nbsp;Upload Payment</a>
          </div>
        </div>
      </div>
  </div>
@endsection
