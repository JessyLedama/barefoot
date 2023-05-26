<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('line-icons/LineIcons.min.css') }}">
    <!-- themify icons -->
    <link rel="stylesheet" href="{{ asset('themify-icons/themify-icons.css') }}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/campaign-land.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick.css') }}">
    
    <script src="{{ asset('js/home-layout.js')}}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/images/Barefoot-Favicon.jpg') }}" type="image/png"/>
    
    <!-- jquery -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/layout.js')}}"></script>
    <script src="{{ asset('slick-1.8.1/slick/slick.min.js') }}"></script>
    <!-- vue js -->
    <script src="{{ asset('js/vue.min.js')}}"></script>
    <script src="{{ asset('js/vuex.min.js')}}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('#home-slideshow').slick({
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000,
                prevArrow: '<i class="ti-angle-left slick-prev"></i>',
                nextArrow: '<i class="ti-angle-right slick-next"></i>'
            });
        });
    </script>
    
</head>
<body>
    <!-- <div id="app"> -->
        <nav class="fix">
            <div class="clearfix desktop">
                <a href="/" id="logo" class="left">
                    <img src="/images/Barefoot-Adventure-Logo.png" alt="Barefoot Adventures" class="green-blue-logo" style="display:inline-block">
                </a>
                
                <div class="right clearfix" id="nav-menu">
                    <a href="{{ url("/") }}">Home</a>
                    <a href="{{ url("/about-us/") }}">About Us</a>
                    <span class="username-drops">
                        <a href="{{ url("/kenya-safaris/") }}">
                            Kenya Safaris
                        </a>
                        <small class="menu-drop-icon">
                            <i class="ti-angle-down"></i>
                        </small>

                        <?php
                            use App\Models\Subcategory;

                            $subcategories = Subcategory::all();
                        ?>
                        <ul class="username-dropdown">
                            <li>
                                <a style="color:#3c3430" href="{{ url("/kenya-local-safaris/") }}">
                                    Local Safaris
                                </a>
                            </li>
                            <li><a style="color:#3c3430" href="{{ url("/kenya-multiple-day-safaris/") }}">Multiple Day Safaris</a></li>
                        </ul>
                    </span>
                    <a href="/uganda-safaris/">
                        Uganda Safaris
                    </a>
                    <a href="/tanzania-safaris/">
                        Tanzania Safaris
                    </a>
                    <span class="username-drops">
                        More
                        <small class="menu-drop-icon">
                            <i class="ti-angle-down"></i>
                        </small>
                        <ul class="username-dropdown">
                            <li><a href="/gallery/">Gallery</a></li>
                            <li><a href="/tourist-locations/">Top Tourist Attractions</a></li>
                            <li><a href="/contact-us/">Contact us</a></li>
                            <!-- <li><a href="/frequently-asked-questions/">FAQ</a></li> -->
                        </ul>
                    </span>
                    
                    @auth
                        <span class="username-drops">
                            Hi {{{ Auth::user()->firstName }}}

                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            
                            <ul class="username-dropdown">
                                <li>
                                    <span onclick="window.location.href = `{{ route(Auth::user()->role == 'customer' ? 'customer.profile.edit' : 'account.edit') }}`">
                                        <i class="lnr lnr-user"></i>

                                        My account
                                    </span>
                                </li>
                                <li>
                                    
                                        <i class="lni-package"></i>

                                        Safaris
                                    </span>
                                </li>
                                <li>
                                    <span onclick="document.getElementById('logout-form').submit()">
                                        Logout
                                    </span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </span>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" id="account" class="right">
                            Login &nbsp; | &nbsp; Sign up
                        </a>
                    @endguest
                </div>
            </div>
            <div class="clearfix mobile">
                <a href="/" id="logo" class="left">
                    <img src="/images/Barefoot-Adventure-Logo.png" alt="Barefoot Adventures" class="green-blue-logo" style="display:inline-block">
                </a>
                <div id="side-menu">
                    <div id="nav-menu">
                        <span>
                            <a href="{{ url("/") }}">Home</a>
                        </span>
                        <span>
                            <a href="{{ url("/about-us/") }}">About Us</a>
                        </span>
                        <span class="username-drops">
                            <a href="{{ url("/kenya-safaris/") }}">
                                Kenya Safaris
                            </a>
                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            <ul class="username-dropdown">
                                <li>
                                    <a style="color:#3c3430" href="{{ url("/kenya-local-safaris/") }}">
                                        Local Safaris
                                    </a>
                                </li>
                                <li><a style="color:#3c3430" href="{{ url("/kenya-multiple-day-safaris/") }}">Multiple Day Safaris</a></li>
                            </ul>
                        </span>
                        <span>
                            <a href="/uganda-safaris/">
                                Uganda Safaris
                            </a>
                        </span>
                        <span>
                            <a href="/tanzania-safaris/">
                                Tanzania Safaris
                            </a>
                        </span>
                        <span class="username-drops">
                            More
                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            <ul class="username-dropdown">
                                <li><a style="color:#3c3430" href="/gallery/">Gallery</a></li>
                                <li><a style="color:#3c3430" href="/tourist-locations/">Tourist Attraction Sites</a></li>
                                <li><a style="color:#3c3430" href="/contact-us/">Contact us</a></li>
                                <!--<li><a style="color:#3c3430" href="/frequently-asked-questions/">FAQ</a></li>-->
                            </ul>
                        </span>
                    </div>
                    @auth
                        <span class="username-drops">
                            Hi {{{ Auth::user()->firstName }}}

                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            
                            <ul class="username-dropdown">
                                <li>
                                    <span onclick="window.location.href = `{{ route(Auth::user()->role == 'customer' ? 'customer.profile.edit' : 'account.edit') }}`">
                                        <i class="lnr lnr-user"></i>

                                        My account
                                    </span>
                                </li>
                                <li>
                                    
                                        <i class="lni-package"></i>

                                        Safaris
                                    </span>
                                </li>
                                <li>
                                    <span onclick="document.getElementById('logout-form').submit()">
                                        Logout
                                    </span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </span>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" id="account" class="right">
                            Login &nbsp; | &nbsp; Sign up
                        </a>
                    @endguest
                </div>
                <div class="right">
                    <span id="mobile-navicon">
                        <i class="lni-menu"></i>
                    </span>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    <!-- </div> -->

    <footer>
        @extends('layouts/footer')
    </footer>

    <script>
        jQuery(document).ready(function($){
            $('nav > .clearfix.desktop #invest-in').hover(function () {
                $('#invest-in-dropdown').toggleClass('drop');
            });

            $('nav > .clearfix.desktop #more').hover(function () {
                $('nav > .clearfix.desktop #more-dropdown').toggleClass('drop');
            });

            $('nav > .clearfix.desktop #account').hover(function () {
                $('nav > .clearfix.desktop #account-dropdown').toggleClass('drop');
            });

            $('#side-menu #invest-in').click(function () {
                $('#side-menu #invest-in-dropdown').toggleClass('drop');
            });

            $('#side-menu #more').click(function () {
                $('#side-menu #more-dropdown').toggleClass('drop');
            });

            $('#side-menu #account').click(function () {
                $('#side-menu #account-dropdown').toggleClass('drop');
            });

            $('#mobile-navicon').click(function () {
                $('#side-menu').toggleClass('drop');
            });

            $('#mobile-search').click(function () {
                $('nav > .clearfix.mobile form').toggleClass('drop');
            });
        });
    </script>
