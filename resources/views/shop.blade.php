@extends('layouts.app')

@section('content')
    <div class="page-title-wrapper" aria-label="Page title">
        <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ Str::title($category->collection->name) }}</a></li>
            </ol>
            </nav>
            <h1 class="page-title">{{ Str::title($category->name) }}</h1><span class="d-block mt-2 text-muted"></span>
        </div>
    </div>

    <div class="container pb-5 mb-4">
        <!-- Products grid-->
        <div class="row">
            <!-- Product -->
            @foreach ($products as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card mb-4">
                    <div class="product-thumb">
						<a class="product-thumb-link" href="{{ route('item', [$item]) }}"></a>
                        @auth
                        <span class="product-wishlist-btn btn-wishlist-add" data-id="{{ $item->id }}" title="Add to wishlist"><i data-feather="heart"></i></span>
                        @if(auth()->user()->type == 'seller')
                        <span class="product-wishlist-btn btn-featured" data-id="{{ $item->id }}" title="Add to feature"><i data-feather="star"></i></span>
                        @endif
                        @endauth

                        @if (str_contains(get_headers(env('APP_PRODUCTS_URL') . $item->image)[0], '200'))
                        <img src="{{ asset(env('APP_PRODUCTS_URL') . $item->image) }}" alt="{{ Str::title($item->title) }}">
                        @else
                        <img src="{{ asset('img/noimage.png') }}" alt="{{ Str::title($item->title) }}">
                        @endif
                    </div>
                    <div class="product-card-body text-center">
                        <a class="product-meta" href="#">{{ Str::title($item->category->name) }}</a>
                        <h3 class="product-card-title">
                            <a href="{{ route('item', [$item]) }}">{{ Str::title($item->title) }}</a>
                        </h3>
                        <span class="text-primary">Php {{ number_format($item->price, 2) }}</span>
                    </div>
                    <div class="product-card-body">
                        <button class="btn btn-primary btn-sm btn-block btn-cart-add" type="button" data-id="{{ $item->id }}">Add to cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <hr class="pb-4 mb-2">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center justify-content-sm-start mb-0">
                <li class="page-item d-none d-sm-block">{{ $products->onEachSide(1)->links() }}</li>
                {{-- <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item d-sm-none"><span class="page-link page-link-static">2 / 5</span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">1</a></li>
                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">2<span class="sr-only">(current)</span></span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                <li class="page-item d-none d-sm-block">...</li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">10</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
            </ul>
        </nav>
    </div>
@endsection

@push('scripts')
    <script src="/js/cart.js"></script>
@endpush

@push('styles')
    <style>
        .btn-featured {
            position: absolute!important;
            top: 3rem!important;
        }
    </style>
@endpush
