@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['title' => 'Orders - ' .$order->id])

<div class="container pb-5 mb-4">
    <div class="d-none d-lg-block">
        <ul class="list-unstyled">
            <li>Order Date: <span class="font-weight-semibold ml-1">{{ $order->created_at }}</span></li>
            <li>Order Status: <span class="font-weight-semibold ml-1">{{ $order->status }}</span></li>
            <li>Order Total: <span class="font-weight-semibold ml-1">{{ number_format($order->total, 2) }}</span></li>
            <li>Payment Code: <span class="font-weight-semibold ml-1">{{ $order->payment_code }}</span></li>
            <li>Payment Ref: <span class="font-weight-semibold ml-1">{{ $order->payment_reference }}</span></li>
            <li>Payment Notes: <span class="font-weight-semibold ml-1">{{ $order->payment_notes }}</span></li>
            <li>Payment Date: <span class="font-weight-semibold ml-1">{{ $order->payment_date }}</span></li>
        </ul>
    </div>

    <div class="table-responsive font-size-sm">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th>Ref #</th>
                <th>Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>ShippingFee</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->reference_number }}</td>
                    <td title="{{ Str::title($item->title) }}">{{ Str::title(Str::limit($item->title, 30)) }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->subtotal, 2) }}</td>
                    <td>{{ number_format($item->shipping_fee, 2) }}</td>
                    <td>{{ number_format($item->total, 2) }}</td>
                    <td>{{ Str::title($item->status) }}</td>
                </tr>
                @endforeach
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td>{{ number_format($order->subtotal, 2) }}</td>
                    <td>{{ number_format($order->shipping_fee, 2) }}</td>
                    <td>{{ number_format($order->total + $order->discount, 2) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>{{ number_format($order->discount, 2) }} Discount</td>
                    <td></td>
                </tr>
                </tfoot>
            </tbody>
        </table>
    </div>

    @include('partials.message')
    @if (in_array($order->status, ['pending', 'hold']))
    <hr class="pb-4">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('orders.upload-payment', $order->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="help-text-input">Upload Proof of Payment</label>
                    <input type="file" id="payment" name="payment" class="form-control" value=""  accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{route('orders.cancel', $order->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="help-text-input">Cancel Order</label>
                    <input class="form-control" type="text" name="reason" id="reason" placeholder="Cancellation reason here..." required>
                </div>

                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
        </div>
    </div>
    <hr class="pb-4 border-top-0">
    @endif
</div>
@endsection


