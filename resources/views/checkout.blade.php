@extends('layouts.app')

@section('content')
    @auth
        @if (count($cart) > 0)
            <div class="page-title-wrapper" aria-label="Page title">
                <div class="container">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                    </ol>
                    </nav>
                    <h1 class="page-title">Checkout</h1><span class="d-block mt-2 text-muted"></span>
                </div>
            </div>

            <div class="container pb-5 mb-sm-4 mt-n2 mt-md-n3">
                <form method="post" action="{{ route('checkout.process') }}">
                @csrf
                <div class="row pt-4 mt-2">
                    <!-- Content-->
                    <div class="col-xl-9 col-md-8">
                        <div class="d-sm-flex justify-content-between bg-secondary px-4 py-3 mb-4">
                            <div class="media"><img class="img-thumbnail rounded-circle mr-3" src="{{ asset('img/account/customer.jpg') }}" width="95" alt="Daniel Adams">
                                <div class="media-body align-self-center">
                                    <h6 class="mb-1">{{ Str::title(Auth::user()->name) }}</h6>
                                    <div class="font-size-sm"><span class="text-warning">{{ Auth::user()->username }}</span></div>
                                    <div class="font-size-sm"><span class="text-warning">{{ Auth::user()->email }}</span></div>
                                </div>
                            </div>
                            <div class="pt-3 pl-sm-2 text-right"><a class="btn btn-light btn-sm" href="{{ route('profiles.index') }}"><i class="mr-2" data-feather="edit"></i>Edit profile</a></div>
                        </div>

                        <h6 class="mb-3 pt-2 pb-3 border-bottom">Shipping Address</h6>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
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
                        </div>

                        <h6 class="mb-3 pt-4 pb-3 border-bottom">Orders</h6>
                        <!-- Item-->
                        @foreach ($cart as $item)
                            <div class="d-sm-flex justify-content-between mb-4 pb-4 border-bottom">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#">
                                    @if (file_exists(env('APP_PRODUCTS_URL') . $item['item']['image']))
                                        <img src="{{ asset(env('APP_PRODUCTS_URL') . $item['item']['image']) }}" alt="{{ Str::title($item['item']['itle']) }}">
                                    @else
                                        <img src="{{ asset('img/noimage.png') }}" alt="{{ Str::title($item['item']['title']) }}">
                                    @endif
                                    </a>
                                    <div class="media-body pt-3">
                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="{{ route('item', $item['item']['id']) }}">{{ $item['item']['title'] }}</a></h3>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Price:</span>{{ number_format($item['item']['price'], 2) }}</div>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Shipping Fee:</span>{{ number_format($item['item']['shipping_fee'], 2) }}</div>
                                    </div>
                                </div>
                                <div class="pt-2 pt-sm-3 pl-sm-3 mx-auto mx-sm-0 text-center">
                                    <div class="text-muted mb-sm-2">Quantity:</div>
                                    <div class="font-weight-semibold">{{ $item['quantity'] }}</div>
                                </div>
                                <div class="pt-2 pt-sm-3 pl-sm-3 mx-auto mx-sm-0 text-center">
                                    <div class="text-muted mb-sm-2">Subtotal:</div>
                                    <div class="font-weight-semibold">Php {{ number_format(($item['item']['price'] + $item['item']['shipping_fee']) * $item['quantity'], 2) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Sidebar-->
                    <div class="col-xl-3 col-md-4 pt-4 mt-3 pt-md-0 mt-md-0">
                        <h2 class="h6 px-4 py-3 bg-secondary text-center">Order summary</h2>
                        <div class="font-size-sm border-bottom pt-2 pb-3">
                            <div class="d-flex justify-content-between mb-2"><span>Subtotal:</span><span>Php {{ $subtotal }}</span></div>
                            <div class="d-flex justify-content-between mb-2"><span>Shipping:</span><span>Php {{ $totalSF }}</span></div>
                            <div class="d-flex justify-content-between"><span>Discount:</span><span>Php {{ $discount }}</span></div>
                        </div>
                        <div class="h3 font-weight-semibold text-center py-3">Php {{ $total }}</div>
                        <button class="btn btn-primary btn-block" type="submit">Complete Order</button>

                        <!-- Promo banner-->
                        <a class="d-block text-decoration-0 mt-4 mx-auto pt-2" href="#" style="max-width: 277px;">
                        <div class="bg-secondary">
                            <div class="px-3 pt-4 text-center">
                            <h4 class="h5 pb-2">Ad Space</h4>
                            </div><img src="img/checkout/ad-1.png" alt="Promo banner">
                        </div></a>
                    </div>
                </div>
                </form>
            </div>
        @else
            <div class="container pb-5">
                <div class="pt-5"><img class="d-block my-4 mx-auto" src="{{ asset('img/404.jpg') }}" alt="404 Page not found"></div>
                <div class="pt-3 pb-2 text-center">
                    <h1 class="h2">Opps! Your cart is empty!</h1>
                    <p class="text-muted">Looks like you haven't added anything to your cart yet.<br/><br/><a class="font-weight-semibold btn btn-primary" href="{{ route('home') }}">Shop Now</a></p>
                </div>
            </div>
        @endif
    @else
    <div class="container pb-5">
        <div class="pt-5"><img class="d-block my-4 mx-auto" src="{{ asset('img/404.jpg') }}" alt="404 Page not found"></div>
        <div class="pt-3 pb-2 text-center">
            <h1 class="h2">Please login to continue.</h1>
            <p class="text-muted">Login your account to checkout faster.&nbsp;<a class="font-weight-semibold" href="{{ route('login') }}">Sign In</a> Or <a class="font-weight-semibold" href="{{ route('login') }}">Open a new account.</a></p>
        </div>
    </div>
    @endauth
@endsection