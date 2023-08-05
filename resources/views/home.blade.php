@extends('layouts.app')

@section('content')
    <!-- Hero slider + Promo list-->
    <section class="container px-3">
        <div class="mt-4 pt-lg-2 mb-4 mb-md-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero slider 1-->
                    <!-- <div class="bg-secondary bg-size-cover mb-grid-gutter" style="background-image: url({{ asset('img/home/banner/bg.jpg') }});">
                        <div class="owl-carousel trigger-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoHeight&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 5500 }">
                            <div class="row align-items-center py-5">
                                <div class="col-md-12"><img class="d-block mx-auto" src="{{ asset('img/home/banner/1.png') }}" alt="banner"></div>
                            </div>

                            <div class="row align-items-center py-5">
                                <div class="col-md-12"><img class="d-block mx-auto" src="{{ asset('img/home/banner/2.png') }}" alt="banner"></div>
                            </div>

                            <div class="row align-items-center py-5">
                                <div class="col-md-12"><img class="d-block mx-auto" src="{{ asset('img/home/banner/3.png') }}" alt="banner"></div>
                            </div>

                            <div class="row align-items-center py-5">
                                <div class="col-md-12"><img class="d-block mx-auto" src="{{ asset('img/home/banner/4.png') }}" alt="banner"></div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Hero slider 2-->
                    <div class="bg-secondary bg-size-cover mb-grid-gutter" style="background-image: url({{ asset('img/home/banner/bg.jpg') }});">
                        <div class="owl-carousel trigger-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoHeight&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 5500 }">
                            <div class="row align-items-center py-5">
                                <div class="col-md-5">
                                    <div class="pl-3 pr-3 pl-md-5 pr-md-0 pt-4 pt-lg-5 pb-5 text-center text-md-left">
                                        <h3 class="mb-1">Buhay Asenso Sa Online Negosyo!</h3>
                                        <h4 class="font-weight-light opacity-70 pb-3"></h4><a class="btn btn-primary" href="#">More Info<i class="ml-2" data-feather="arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-7"><img class="d-block mx-auto" src="{{ asset('img/home/banner/1.png') }}" alt="banner"></div>
                            </div>

                            <div class="row align-items-center py-5">
                                <div class="col-md-5">
                                    <div class="pl-3 pr-3 pl-md-5 pr-md-0 pt-4 pt-lg-5 pb-5 text-center text-md-left">
                                        <h3 class="mb-1">Ang Negosyo Ng Bayan</h3>
                                        <h4 class="font-weight-light opacity-70 pb-3">Limited time offer for only Php 12,000</h4><a class="btn btn-primary" href="#">More Info<i class="ml-2" data-feather="arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-7"><img class="d-block mx-auto" src="{{ asset('img/home/banner/2.png') }}" alt="banner"></div>
                            </div>

                            <div class="row align-items-center py-5">
                                <div class="col-md-5">
                                    <div class="pl-3 pr-3 pl-md-5 pr-md-0 pt-4 pt-lg-5 pb-5 text-center text-md-left">
                                        <h3 class="mb-1">Extra Pera Ngayong Pandemya!</h3>
                                        <h4 class="font-weight-light opacity-70 pb-3"></h4><a class="btn btn-primary" href="#">More Info<i class="ml-2" data-feather="arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-7"><img class="d-block mx-auto" src="{{ asset('img/home/banner/3.png') }}" alt="banner"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr class="mt-4">
    </section>

    <!-- Featured products grid-->
    <section class="container pt-3 pb-4">
        <h2 class="h3 text-center pb-4">Featured Products</h2>
        <div class="row">
            <!-- Product-->
            @foreach ($featuredProducts as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card mb-4">
                    <div class="product-thumb">
                        <a class="product-thumb-link" href="{{ route('item', $item->id) }}"></a>
                        @if (str_contains(get_headers(env('APP_PRODUCTS_URL') . $item->image)[0], '200'))
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
    </section>

    <!-- Promo banner-->
    <section class="container py-4 my-3 px-3">
        <div class="bg-faded-info position-relative py-4">
            <div class="row align-items-center">
                <div class="col-md-5"><span class="badge badge-danger ml-5">Limited offer</span>
                    <div class="pt-4 pl-4 pl-sm-5">
                        <h3 class="font-family-body font-weight-light mb-2">Ads here</h3>
                        <h2 class="mb-2 pb-1">Ad title</h2>
                        <h5 class="font-family-body font-weight-light mb-3">Ad details here...</h5>
                        <a class="btn btn-primary" href="#">View offers<i class="ml-2" data-feather="arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-7"><img class="mx-auto" src="{{ asset('img/home/offer.jpg') }}" alt="Promo banner"></div>
            </div>
        </div>
    </section>

      <!-- Brands carousel-->
    <section class="container px-3 pb-4">
        <div class="owl-carousel border-right" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3500, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/01.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/02.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/05.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/04.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/03.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/06.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/07.png') }}" style="width: 165px;" alt="Brand"></a>
            <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right: -.0625rem;"><img class="d-block mx-auto" src="{{ asset('img/home/brands/08.png') }}" style="width: 165px;" alt="Brand"></a>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="/js/cart.js"></script>
@endpush
