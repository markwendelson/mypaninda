@extends('layouts.app')

@section('content')
    <div class="page-title-wrapper" aria-label="Page title">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Item</a></li>
            </ol>
            </nav>
            <h1 class="page-title">{{ Str::title($product->title) }}</h1><span class="d-block mt-2 text-muted"></span>
            <section class="sg-product">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="sg-img">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="sg1" role="tabpanel">
                                            @if (str_contains(get_headers(env('APP_PRODUCTS_URL') . $product->image)[0], '200'))
                                                <img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image) }}" alt="{{ Str::title($product->title) }}" class="img-fluid">
                                            @else
                                                <img src="{{ asset('img/noimage.png') }}" alt="{{ Str::title($product->title) }}" class="img-fluid">
                                            @endif
                                            </div>

                                            <!-- @if($product->image_2)
                                            <div class="tab-pane" id="sg2" role="tabpanel">
                                                <img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image_2) }}" alt="{{ Str::title($product->title) }}" class="img-fluid">
                                            </div>
                                            @endif

                                            @if($product->image_3)
                                            <div class="tab-pane" id="sg3" role="tabpanel">
                                                <img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image_3) }}" alt="{{ Str::title($product->title) }}" class="img-fluid">
                                            </div>
                                            @endif -->
                                        </div>
                                        
                                        <!-- <div class="nav d-flex justify-content-between">
                                            <a class="nav-item nav-link active" data-toggle="tab" href="#sg1"><img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image) }}" alt=""></a>

                                            @if($product->image_2)
                                            <a class="nav-item nav-link" data-toggle="tab" href="#sg2"><img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image_2) }}" alt=""></a>
                                            @endif

                                            @if($product->image_3)
                                            <a class="nav-item nav-link" data-toggle="tab" href="#sg3"><img src="{{ asset(env('APP_PRODUCTS_URL') . $product->image_3) }}" alt=""></a>
                                            @endif
                                        </div> -->
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="sg-content">
                                        <div class="pro-tag">
                                            <ul class="list-unstyled list-inline">
                                                <li class="list-inline-item"><a href="">{{ $product->category->collection->name }},</a></li>
                                                <li class="list-inline-item"><a href="">{{ $product->category->name }},</a></li>
                                                <li class="list-inline-item"><a href="{{ route('search', ['q' => $product->brand]) }}">{{ $product->brand }}</a></li>
                                            </ul>
                                        </div>
                                            <div class="pro-name">
                                                <p>{{ Str::title($product->title) }}</p>
                                            </div>
                                            <div class="pro-price">
                                                <ul class="list-unstyled list-inline">
                                                    <li class="list-inline-item">Price: <i>Php {{ number_format($product->price, 2) }}</i></li>
                                                    <li class="list-inline-item"></li>
                                                </ul>
                                                <p>Shipping Fee : <span><i>Php {{ number_format($product->shipping_fee, 2) }}</span></i></p>
                                                <p>Condition : <span><i>{{ Str::title($product->condition) }}</span></i></p>
                                                <p>Stocks : <span><i>{{ $product->stocks }}</span></i></p>
                                            </div>
                                            <div class="colo-siz">
                                                <div class="pro-btns">
                                                    <button class="btn btn-primary btn-sm btn-cart-add" type="button" data-id="{{ $product->id }}">Add to cart</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                {{ $product->description }}
                                </div>

                                <h2 class="h6">Recommendations</h2>
                                <div class="row col-md-12">
                                    @foreach ($recommendations as $item)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="product-card mb-4">
                                            <div class="product-thumb">
                                                <a class="product-thumb-link" href="{{ route('item', $item->id) }}"></a>
                                                @if (file_exists(env('APP_PRODUCTS_URL') . $item->image))
                                                <img src="{{ asset(env('APP_PRODUCTS_URL') . $item->image) }}" alt="{{ Str::title($item->title) }}">
                                                @else
                                                <img src="{{ asset('img/noimage.png') }}" alt="{{ Str::title($item->title) }}">
                                                @endif
                                            </div>
                                            <div class="product-card-body text-center"><a class="product-meta" href="#">Men's jeans</a>
                                                <h3 class="product-card-title">
                                                    <a href="{{ route('item', $item->id) }}">{{ $item->title }}</a>
                                                </h3>
                                                <span class="text-primary">Php {{ $item->price }}</span>
                                            </div>
                                            <div class="product-card-body">
                                                <button class="btn btn-primary btn-sm btn-block btn-cart-add" type="button" data-id="{{ $item->id }}">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="category-box">
                                <div class="sec-title">
                                    <h6>Categories</h6>
                                </div>
                                <!-- accordion -->
                                <div id="accordion">
                                    @foreach ($collections as $collection)
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="" data-toggle="collapse" data-target="{{ '#collapse'. $collection->id}}">
                                                    <span>{{ Str::title($collection->name) }}</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                            </div>
                                            @if ($collection->categories()->count() > 0)
                                                <div id="{{ 'collapse'. $collection->id}}" class="collapse">
                                                    <div class="card-body">
                                                        <ul class="list-unstyled">
                                                            @foreach ($collection->categories as $item)
                                                                <li><a href="{{ route('shop', ['category' => $item->id]) }}"><i class="fa fa-angle-right"></i> {{ Str::title($item->name) }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/cart.js"></script>
    <script>
    $(".sim-slider").owlCarousel({
		autoplay:false,
    	autoplayHoverPause:true,
    	smartSpeed:500,
		loop: true,
		responsiveClass: true,
		items : 4,
		nav : true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		margin: 25,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			576: {
				items: 2
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			}
		}
    });
    </script>
@endpush
