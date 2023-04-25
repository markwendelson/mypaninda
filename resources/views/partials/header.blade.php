<!-- First line: Topbar-->
<div class="navbar py-2 px-0" style="background-color: #e40b52;">
    <div class="container px-3">
        <!-- contact info-->
        <ul class="list-inline mb-0 d-none d-lg-inline-block">
            <li class="list-inline-item opacity-75 mr-2"><i class="text-light mr-2" data-feather="phone" style="width: 13px; height: 13px;"></i><a class="text-light font-size-sm py-1 pl-0 pr-2" href="tel:639499632514">+639-499-632-514</a></li>
            <li class="list-inline-item opacity-75 mr-2"><i class="text-light mr-2" data-feather="mail" style="width: 13px; height: 13px;"></i><a class="text-light font-size-sm py-1 pl-0 pr-2" href="mailto:hello@mypaninda.com">hello@mypaninda.com</a></li>
        </ul>
        <!-- links collapsed (moblie)-->
        <div class="dropdown d-inline-block d-lg-none"><a class="dropdown-toggle text-light opacity-75 font-size-sm py-1" href="#" data-toggle="dropdown">Useful links</a>
            <div class="dropdown-menu"><a class="dropdown-item" href="#">About us</a><a class="dropdown-item" href="#">Help center</a><a class="dropdown-item" href="{{ route('page.contacts') }}">Contacts</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="tel:00331697720"><i class="mr-2" data-feather="phone" style="width: 13px; height: 13px;"></i>00 33 169 7720</a><a class="dropdown-item" href="mailto:info@example.com"><i class="mr-2" data-feather="mail" style="width: 13px; height: 13px;"></i>info@example.com</a></div>
        </div>
        <div class="d-flex">
            <!-- topbar menu-->
            <ul class="list-inline mb-0 d-none d-lg-block">
                <li class="list-inline-item mr-2"><a class="text-light font-size-sm opacity-75 py-1 pl-0 pr-2 border-right border-light" href="{{ route('page.about') }}">About us</a></li>
                <li class="list-inline-item mr-2"><a class="text-light font-size-sm opacity-75 py-1 pl-0 pr-2 border-right border-light" href="#">Help center</a></li>
                <li class="list-inline-item mr-2"><a class="text-light font-size-sm opacity-75 py-1 pl-0 pr-2" href="{{ route('page.contacts') }}">Contacts</a></li>
            </ul>
            <!-- social bar  -->
            <div class="d-flex flex-nowrap">
                <a class="social-btn sb-facebook sb-light sb-sm ml-2" href="#"><i class="flaticon-facebook"></i><span class="sr-only">Facebook</span></a>
                <a class="social-btn sb-twitter sb-light sb-sm ml-2" href="#"><i class="flaticon-twitter"></i><span class="sr-only">Twitter</span></a>
                <a class="social-btn sb-instagram sb-light sb-sm ml-2" href="#"><i class="flaticon-instagram"></i><span class="sr-only">Instagram</span></a>
            </div>
        </div>
    </div>
</div>

<!-- Second line-->
<header class="navbar navbar-expand-lg px-0">
    <div class="container flex-sm-nowrap px-3">
        <!-- navbar brand-->
        <a class="navbar-brand mr-0 mr-sm-4" style="min-width: 100px;" href="{{ route('home') }}"><img width="100" src="{{ asset('img/logo-dark.png') }}" alt="MStore"/></a>
        <!-- navbar buttons-->
        <div class="navbar-btns d-flex position-relative order-sm-3">
            <div class="navbar-toggler navbar-btn collapsed bg-0 border-left-0 my-3" data-toggle="collapse" data-target="#menu"><i class="mx-auto mb-2" data-feather="menu"></i>Menu</div>
            <a class="navbar-btn bg-0 my-3" href="{{ route('cart') }}"><span class="d-block position-relative"><span class="navbar-btn-badge bg-primary text-light" id="cart-count">{{ count(session('cart', [])) }}</span><i class="mx-auto mb-1" data-feather="shopping-cart" data-stroke="#e40b52"></i>Cart</span></a>
            @auth
            <a class="navbar-btn bg-0 my-3" href="{{ route('me') }}"><i class="mx-auto mb-1" data-feather="user"></i>My Account</a>
            <a class="navbar-btn bg-0 my-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mx-auto mb-1" data-feather="log-out"></i>Sign Out</a>
            @else
            <a class="navbar-btn bg-0 my-3" href="{{ route('login') }}"><i class="mx-auto mb-1" data-feather="log-in"></i>Sign In/Up</a>
            @endauth
        </div>
        <!-- search-box-->
        <div class="flex-grow-1 pb-3 pt-sm-3 my-1 px-sm-2 pr-lg-4 order-sm-2">
            <div class="input-group flex-nowrap">
            <div class="input-group-prepend"><span class="input-group-text rounded-left" id="search-icon"><i data-feather="search"></i></span></div>
            <input class="form-control rounded-right" type="text" id="site-search" placeholder="MyPaninda Search..." aria-label="search" aria-describedby="search-icon">
            </div>
        </div>
    </div>
</header>

<!-- Third line: Navigation-->
<div class="navbar navbar-expand-lg px-0" style="background-color: #2a61d6;">
    <div class="container px-3">
    <!-- navbar collapse area-->
        <div class="collapse navbar-collapse" id="menu">
            <!-- Site menu-->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Categories</a>
                    <ul class="dropdown-menu">
                        @foreach ($collections as $collection)
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">{{ Str::title($collection->name) }}</a>
                            @if ($collection->categories()->count() > 0)
                            <ul class="dropdown-menu">
                                @foreach ($collection->categories as $item)
                                <li><a class="dropdown-item" href="{{ route('shop', ['category' => $item->id]) }}">{{ Str::title($item->name) }}</a></li>
                                <li class="dropdown-divider"></li>
                                @endforeach
                            </ul>
                            @endif
                            </li>
                            <li class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">My Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('checkout') }}">Checkout</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('page.about') }}">About Us</a></li>

                @auth
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">My Account</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('me') }}">My Orders</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('profiles.index') }}">My Profile</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('addresses.index') }}">My Shipping Address</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('profiles.password') }}">Password Reset</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('profiles.upgrade') }}">Upgrade Account</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
