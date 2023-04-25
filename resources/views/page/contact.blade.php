@extends('layouts.app')

@section('content')
<!-- Page Title-->
<div class="page-title-wrapper" aria-label="Page title">
    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="mt-n1 mr-1"><i data-feather="home"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Pages</a>
            </li>
        </ol>
        </nav>
        <h1 class="page-title">Contacts</h1><span class="d-block mt-2 text-muted"></span>
    </div>
</div>

<div class="container-fluid pb-4 mb-3">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-grid-gutter"><a class="card scroll-to" href="#map">
            <div class="card-body">
                <div class="icon-box text-center">
                    <div class="icon-box-icon"><i data-feather="map-pin"></i></div>
                    <h3 class="icon-box-title">Main store address</h3>
                    <p class="icon-box-text pb-2">396 Lillian Blvd, Holbrook, NY 11741, USA</p>
                </div>
            </div></a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card">
                <div class="card-body">
                    <div class="icon-box text-center">
                        <div class="icon-box-icon"><i data-feather="clock"></i></div>
                        <h3 class="icon-box-title">Working hours</h3>
                        <ul class="list-unstyled icon-box-text pb-2">
                            <li>Mon - Fri: 10AM - 19PM</li>
                            <li>Sat: 11AM - 17PM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card">
                <div class="card-body">
                    <div class="icon-box text-center">
                        <div class="icon-box-icon"><i data-feather="phone"></i></div>
                        <h3 class="icon-box-title">Phone numbers</h3>
                        <ul class="list-unstyled icon-box-text pb-2">
                            <li>Customer service:&nbsp;<a class="nav-link-inline" href="tel:+108044357260">+1 (080) 44 357 260</a></li>
                            <li>Tech support:&nbsp;<a class="nav-link-inline" href="tel:+100331697720">+1 00 33 169 7720</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-grid-gutter">
            <div class="card">
                <div class="card-body">
                    <div class="icon-box text-center">
                        <div class="icon-box-icon"><i data-feather="mail"></i></div>
                        <h3 class="icon-box-title">Email addresses</h3>
                        <ul class="list-unstyled icon-box-text pb-2">
                            <li>Customer service:&nbsp;<a class="nav-link-inline" href="mailto:customer@example.com">customer@example.com</a></li>
                            <li>Tech support:&nbsp;<a class="nav-link-inline" href="mailto:support@example.com">support@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Outlet stores-->
<!-- <div class="container">
    <h2 class="h3 text-center mb-4">Partner outlet stores</h2>
    <div class="row pt-3">
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
        <div class="card"><img class="card-img-top" src="{{ asset('img/contacts/orlando.jpg') }}" alt="Orlando">
        <div class="card-body">
            <h5 class="font-size-lg card-title mb-3 py-1">Orlando</h5>
            <ul class="contact-list">
            <li>
                <div class="contact-icon"><i data-feather="map-pin"></i></div>
                <div class="contact-details"><span class="contact-label">Find us</span><a class="contact-link" href="#">514 S. Magnolia St. Orlando, FL 32806, USA</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="phone"></i></div>
                <div class="contact-details"><span class="contact-label">Call us</span><a class="contact-link" href="tel:+178632256040">+1 (786) 322 560 40</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="mail"></i></div>
                <div class="contact-details"><span class="contact-label">Write us</span><a class="contact-link" href="mailto:orlando@example.com">orlando@example.com</a></div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
        <div class="card"><img class="card-img-top" src="{{ asset('img/contacts/chicago2.jpg') }}" alt="Chicago">
        <div class="card-body">
            <h5 class="font-size-lg card-title mb-3 py-1">Chicago</h5>
            <ul class="contact-list">
            <li>
                <div class="contact-icon"><i data-feather="map-pin"></i></div>
                <div class="contact-details"><span class="contact-label">Find us</span><a class="contact-link" href="#">769, Industrial Dr, West Chicago, IL 60185, USA</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="phone"></i></div>
                <div class="contact-details"><span class="contact-label">Call us</span><a class="contact-link" href="tel:+184725276533">+1 (847) 252 765 33</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="mail"></i></div>
                <div class="contact-details"><span class="contact-label">Write us</span><a class="contact-link" href="mailto:chicago@example.com">chicago@example.com</a></div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 mb-grid-gutter">
        <div class="card"><img class="card-img-top" src="{{ asset('img/contacts/newyork.jpg') }}" alt="New York">
        <div class="card-body">
            <h5 class="font-size-lg card-title mb-3 py-1">New York</h5>
            <ul class="contact-list">
            <li>
                <div class="contact-icon"><i data-feather="map-pin"></i></div>
                <div class="contact-details"><span class="contact-label">Find us</span><a class="contact-link" href="#">396 Lillian Blvd, Holbrook, NY 11741, USA</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="phone"></i></div>
                <div class="contact-details"><span class="contact-label">Call us</span><a class="contact-link" href="tel:+1212477690000">+1 (212) 477 690 000</a></div>
            </li>
            <li>
                <div class="contact-icon"><i data-feather="mail"></i></div>
                <div class="contact-details"><span class="contact-label">Write us</span><a class="contact-link" href="mailto:newyork@example.com">newyork@example.com</a></div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div> -->

<!-- Split section: Map + Contact form-->
<div class="container-fluid px-0 pt-4 pt-lg-5" id="map" data-offset-top="30">
    <div class="row no-gutters">
    <div class="col-lg-12 iframe-full-height-wrap">
        <iframe class="iframe-full-height" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15442.65993208789!2d121.0564935!3d14.6181508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc01d13cfdce576a2!2sSpark+Place!5e0!3m2!1sen!2sph!4v1559871316624!5m2!1sen!2sph" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
</div>
@endsection
