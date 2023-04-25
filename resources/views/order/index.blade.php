@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Orders'])

<div class="container pb-5 mb-4">
    <div class="table-responsive font-size-sm">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Order #</th>
                    <th>Payment Code</th>
                    <th>Payment Ref</th>
                    <th>Total</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('orders.show', [$order]) }}">{{ $order->id }}</a></td>
                    <td><a href="{{ route('orders.show', [$order]) }}">{{ $order->payment_code }}</a></td>
                    <td>{{ $order->payment_reference }}</td>
                    <td>Php {{ number_format($order->total, 2) }}</td>
                    <td>{{ Str::title($order->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <hr class="pb-4">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center justify-content-sm-start mb-0">
            {{ $orders->links() }}
        </ul>
    </nav>
</div>
@endsection
