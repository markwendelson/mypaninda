<!-- Footer-->
<footer class="page-footer bg-dark">
    <!-- shop features-->
    <div class="pt-5 pb-0 pb-md-5 border-bottom border-light" id="shop-features" style="background-color: #1f1f1f;">
        <div class="container">
            <div class="row">
            <div class="col-md-3 col-sm-6 border-right border-light">
                <div class="icon-box text-center mb-5 mb-md-0">
                <div class="icon-box-icon"><i data-feather="truck"></i></div>
                <h3 class="icon-box-title font-weight-semibold text-white">Delivery & Returns</h3>
                <p class="icon-box-text">Some description here...</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 border-right border-light">
                <div class="icon-box text-center mb-5 mb-md-0">
                <div class="icon-box-icon"><i data-feather="book"></i></div>
                <h3 class="icon-box-title font-weight-semibold text-white">Know-How Centre</h3>
                <p class="icon-box-text">Some description here...</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 border-right border-light">
                <div class="icon-box text-center mb-5 mb-md-0">
                <div class="icon-box-icon"><i data-feather="life-buoy"></i></div>
                <h3 class="icon-box-title font-weight-semibold text-white">24/7 customer support</h3>
                <p class="icon-box-text">Friendly 24/7 customer support</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="icon-box text-center mb-5 mb-md-0">
                <div class="icon-box-icon"><i data-feather="credit-card"></i></div>
                <h3 class="icon-box-title font-weight-semibold text-white">Secure online payment</h3>
                <p class="icon-box-text">We posess SSL / Secure сertificate</p>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- second row-->
    <div class="pt-5 pb-0 pb-md-4" style="background-color: #e40b52;">
        <div class="container">
            <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links pb-4">
                <h3 class="widget-title text-white border-light">About us</h3>
                <ul>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">About Smart-Shop</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Our Products</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Our Offers</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Careers</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">News</span></a></li>
                </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links pb-4">
                <h3 class="widget-title text-white border-light">Account &amp; shipping info</h3>
                <ul>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Your Account</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Your Orders</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Shipping rates &amp; policies</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Cancellations &amp; Refunds</span></a></li>
                    <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Taxes</span></a></li>
                </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-links pb-4">
                    <h3 class="widget-title text-white border-light">Links</h3>
                    <ul>
                        @auth
                        <li><a class="nav-link-inline nav-link-light" href="{{ route('me') }}"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">My Account</span></a></li>
                        @else
                        <li><a class="nav-link-inline nav-link-light" href="{{ route('login') }}"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Sign In/Register</span></a></li>
                        @endauth
                        <li><a class="nav-link-inline nav-link-light" href="#"><i class="widget-categories-indicator" data-feather="chevron-right"></i><span class="font-size-sm">Usage Agreement Policy</span></a></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- third row-->
    <div class="pt-5 pb-4" style="background-color: #1f1f1f;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center text-sm-left">
                    <div class="mb-4 mb-sm-0">
                    <a class="d-inline-block" href="{{ route('home') }}"><img width="100" src="{{ asset('img/logo-light.png') }}" alt="MyPaninda"/></a>
                    </div>
                </div>
                <div class="col-sm-6 text-center text-sm-right">
                    <a class="social-btn sb-facebook sb-light mx-1 mb-2" href="#"><i class="flaticon-facebook"></i></a>
                    <a class="social-btn sb-twitter sb-light mx-1 mb-2" href="#"><i class="flaticon-twitter"></i></a>
                    <a class="social-btn sb-instagram sb-light mx-1 mb-2" href="#"><i class="flaticon-instagram"></i></a>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-sm-9 text-center text-sm-left">
                    <ul class="list-inline font-size-sm">
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Corporates</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Charity</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Blogs</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Affiliates</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Support</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Privacy</a></li>
                        <li class="list-inline-item mr-3"><a class="nav-link-inline nav-link-light" href="#">Terms of use</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 text-center text-sm-right">
                    <div class="d-inline-block"><img width="187" src="{{ asset('img/cards.png') }}" alt="Payment methods"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3" style="background-color: #2a61d6;">
        <div class="container font-size-xs text-center" aria-label="Copyright">
            <span class="text-white opacity-60 mr-1">© All rights reserved. Made by</span>
            <a class="nav-link-inline nav-link-light" href="https://mypaninda.com" target="_blank">MyPaninda.com 2023</a>
        </div>
    </div>
</footer>
<!-- Back To Top Button-->
<a class="scroll-to-top-btn" href="#"><i class="scroll-to-top-btn-icon" data-feather="chevron-up"></i></a>

<!-- Toast add cart notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="cart-add-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Added to cart!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item was added to your cart.</div>
    </div>
</div>

<!-- Toast update notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="cart-update-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Cart item updated!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">Your cart has been updated.</div>
    </div>
</div>

<!-- Toast remove notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="cart-remove-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Cart item deleted!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">The item has been removed from your cart.</div>
    </div>
</div>

<!-- Toast wishlist notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="wishlist-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Added to wishlist!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item was added to your wishlist.</div>
    </div>
</div>

<!-- Toast remove notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="error-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Unexpected Error!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">An error occured while processing your request. Please try again later.</div>
    </div>
</div>

<!-- Toast featured notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="featured-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Added to featured!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item was added to featured.</div>
    </div>
</div>

<!-- Toast featured remove notification -->
<div class="toast-container toast-top-right">
    <div class="toast mb-3" id="featured-remove-toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary text-white"><i class="mr-2" data-feather="check-circle" style="width: 1.25rem; height: 1.25rem;"></i><span class="font-weight-semibold mr-auto">Remove to featured!</span>
            <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item was remove to featured.</div>
    </div>
</div>
