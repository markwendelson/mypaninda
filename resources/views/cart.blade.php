@extends('layouts.app')

@section('content')
    @if (count($cart) > 0)
        <div class="page-title-wrapper" aria-label="Page title">
            <div class="container">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Cart</a>
                    </li>
                </ol>
                </nav>
                <h1 class="page-title">Your cart</h1><span class="d-block mt-2 text-muted"></span>
            </div>
        </div>

        <div class="container pb-5 mt-n2 mt-md-n3">
            @include('partials.message')
            <div class="row">
                <div class="col-xl-9 col-md-8">
                    <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><span>Products</span><a class="font-size-sm" href="{{ route('checkout') }}"><i data-feather="chevron-left" style="width: 1rem; height: 1rem;"></i>Continue shopping</a></h2>
                    <!-- Item-->
                    @foreach ($cart as $id => $item)
                        <div id="item-{{ $id }}" class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                            <div class="media d-block d-sm-flex text-center text-sm-left">
                            <a class="cart-item-thumb mx-auto mr-sm-4" href="#">
                                @if (str_contains(get_headers(env('APP_PRODUCTS_URL') . $item['item']['image'])[0], '200'))
                                <img src="{{ asset(env('APP_PRODUCTS_URL') . $item['item']['image']) }}" alt="{{ Str::title($item['item']['itle']) }}">
                                @else
                                <img src="{{ asset('img/noimage.png') }}" alt="{{ Str::title($item['item']['title']) }}">
                                @endif
                            </a>
                                <div class="media-body pt-3">
                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">{{ $item['item']['title'] }}</a></h3>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Price:</span>{{ number_format($item['item']['price'], 2) }}</div>
                                    <div class="font-size-sm"><span class="text-muted mr-2">Shipping Fee:</span>{{ number_format($item['item']['shipping_fee'], 2) }}</div>
                                    <div class="font-size-lg text-primary pt-2" id="item-{{ $id }}-total">Php {{ number_format(($item['item']['price'] + $item['item']['shipping_fee']) * $item['quantity'] , 2) }}</div>
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                                <div class="form-group mb-2">
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control form-control-sm" type="number" id="item-{{ $id }}-quantity" value="{{ $item['quantity'] }}" min="1">
                                </div>
                                <button class="btn btn-outline-secondary btn-sm btn-block mb-2 btn-cart-update" type="button" data-id="{{ $id }}"><i class="mr-1" data-feather="refresh-cw"></i>Update cart</button>
                                <button class="btn btn-outline-danger btn-sm btn-block mb-2 btn-cart-remove" type="button" data-id="{{ $id }}"><i class="mr-1" data-feather="trash-2"></i>Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sidebar-->
                <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                    <h2 class="h6 px-4 py-3 bg-secondary text-center">Order summary</h2>
                    <div class="font-size-sm border-bottom pt-2 pb-3">
                        <div class="d-flex justify-content-between mb-2"><span>Subtotal:</span><span id="cart-subtotal">Php {{ $subtotal }}</span></div>
                        <div class="d-flex justify-content-between mb-2"><span>Shipping:</span><span id="cart-shipping">Php {{ $totalSF }}</span></div>
                        <div class="d-flex justify-content-between"><span>Discount:</span><span id="cart-discount">Php {{ $discount }}</span></div>
                    </div>
                    <div class="h3 font-weight-semibold text-center py-3" id="cart-total">Php {{ $total }}</div>
                    <hr>
                    <a class="btn btn-primary btn-block" href="{{ route('checkout') }}"><i class="mr-2" data-feather="credit-card"></i>Proceed to Checkout</a>

                    @if ($showCoupon == 0)
                    <div class="pt-4">
                        <div class="accordion" id="cart-accordion">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply promo code<span class="accordion-indicator"><i data-feather="chevron-up"></i></span></a></h3>
                                </div>
                                <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                                    <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST" action="{{ route('cart.promo') }}">
                                        @csrf
                                        <div class="form-group">
                                        <input class="form-control" type="text" id="cart-promocode" name="coupon" placeholder="Promo code" required>
                                        <div class="invalid-feedback">Please provide a valid promo code!</div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-block" type="submit">Apply promo code</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
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
@endsection

@push('scripts')
    <script src="/js/cart.js"></script>
@endpush
