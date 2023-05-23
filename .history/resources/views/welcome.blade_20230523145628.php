<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
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
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ URL::asset('slick-1.8.1/slick/slick.css') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/campaign.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
</head>
<body>
    <!-- <div id="app"> -->
        <nav>
            <div class="clearfix desktop">
                <a href="/" id="logo" class="left">
                    <img src="images/Barefoot-Adventure-Logo-White.png" alt="Barefoot Adventures" class="white-logo">
                    <img src="images/Barefoot-Adventure-Logo.png" alt="Barefoot Adventures" class="green-blue-logo">
                </a>
                
                <div class="right clearfix" id="nav-menu">
                    <span id="invest-in">
                        Kenya Safaris
                        <small class="menu-drop-icon">
                            <i class="ti-angle-down"></i>
                        </small>
                        <ul id="invest-in-dropdown" class="menu-dropdown">
                            <li><a href="">Single Day Safaris</a></li>
                            <li><a href="">Full Weekend Safaris</a></li>
                        </ul>
                    </span>
                    <a href="safaris">
                        Uganda Safaris
                    </a>
                    <a href="">
                        Tanzania Safaris
                    </a>
                    <span id="more">
                        More
                        <small class="menu-drop-icon">
                            <i class="ti-angle-down"></i>
                        </small>
                        <ul id="more-dropdown" class="menu-dropdown">
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">FAQ</a></li>
                        </ul>
                    </span>
                    <span id="account">
                        <i class="fa fa-user-circle-o account-icon"></i>
                        <small class="menu-drop-icon">
                            <i class="ti-angle-down"></i>
                        </small>
                        <ul id="account-dropdown" class="account-dropdown">
                            <li><a href="login">Login</a></li>
                            <li><a href="register">Sign Up</a></li>
                        </ul>
                    </span>
                </div> 
            </div>
            <div class="clearfix mobile">
                <a href="" id="logo" class="left">
                    <img src="images/White-Logo.png" alt="Invest in Africa" class="white-logo">
                    <img src="images/Logo.png" alt="Invest in Africa" class="green-blue-logo">
                </a>
                <form action="" method="get" id="search-form" class="left">
                    <div class="clearfix">
                        <input type="text" name="search" id="search-input" class="pull-left" placeholder="Search category, location or keyword">
                    </div>
                </form>
                <div id="side-menu">
                    <div id="nav-menu">
                        <span id="invest-in">
                            Invest in
                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            <ul id="invest-in-dropdown" class="menu-dropdown">
                                <li><a href="">Fashion</a></li>
                                <li><a href="">Technology</a></li>
                                <li><a href="">Health care</a></li>
                                <li><a href="">Education</a></li>
                                <li><a href="">See more</a></li>
                            </ul>
                        </span>
                        <a href="">
                            Raise capital
                        </a>
                        <span id="more">
                            More
                            <small class="menu-drop-icon">
                                <i class="ti-angle-down"></i>
                            </small>
                            <ul id="more-dropdown" class="menu-dropdown">
                                <li><a href="">Success stories</a></li>
                                <li><a href="">Contact us</a></li>
                                <li><a href="">How to work</a></li>
                                <li><a href="">FAQ</a></li>
                            </ul>
                        </span>
                    </div>
                    <a href="" id="account">
                        Login &nbsp; | &nbsp; Sign up
                    </a>
                </div>
                <div class="right">
                    <span id="mobile-search">
                        <i class="ti-search"></i>
                    </span>
                    <span id="mobile-navicon">
                        <i class="lni-menu"></i>
                    </span>
                </div>
            </div>
        </nav>
        
        @section('content')
        <!-- landing -->
        <section>
            <div id="home-slideshow">
                <div class="home-featured">
                    <img src="images/Lion-Photo.jpg" alt="" class="home-featured-cover">
                    <h4 class="home-featured-caption">
                        <small>The African male Lion crossing a path</small>
                    </h4>
                </div>
                <div class="home-featured">
                    <img src="images/Maasai-Community.jpg" alt="" class="home-featured-cover">
                    <h4 class="home-featured-caption">
                        <small>The Maasai community</small>
                    </h4>
                </div>
                <div class="home-featured">
                    <img src="images/Wildbeest-migration.jpg" alt="" class="home-featured-cover">
                    <h4 class="home-featured-caption">
                        <small>The great Wildbeest Migration</small>
                    </h4>
                </div>
                <div class="home-featured">
                    <img src="images/Elephant-herd.jpg" alt="" class="home-featured-cover">
                    <h4 class="home-featured-caption">
                        <small>Herd of elephants cuddling</small>
                    </h4>
                </div>
                <div class="home-featured">
                    <img src="images/Silverback-Gorilla.jpg" alt="" class="home-featured-cover">
                    <h4 class="home-featured-caption">
                        <small>The Endangered Silverback Gorilla</small>
                    </h4>
                </div>
            </div>
        </section>

        <!-- content -->
        <section>
            <h1 class="section-content-title">POPULAR SAFARIS</h1>
            <div class="clearfix campaign-container">
                @foreach ($safaris as $safari)
                <a class="card-link" href="selected-safari">
                    <div class="left campaign">
                        
                            <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="campaign-cover"/>

                            <h6 class="campaign-title">
                                {{ ucwords($safari->name) }}
                            </h6>
                            <!-- <div class="clearfix">
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>

                                <span class="review">5.0</span>
                                <span class="review">(5)</span>
                            </div> -->
                            <p class="campaign-description">
                                {{ ucwords($safari->description) }}
                            </p>
                            <p class="day-card">
                            <i class="icon-clock fa fa-clock-o"></i>
                                7 Days
                            </p>
                            <p class="location-card">
                            <i class="icon-location fa fa-map-marker"></i>
                                Kenya
                            </p>
                            <span style="margin-right: -8px !important;" class="price-from">from</span>
                            <span class="price-card"> 
                                $ {{ ucwords($safari->price_from) }} per person
                            </span>
                    </div>  
                </a>
                
                @endforeach
            </div>
            <img src="images/leopard-sneaking.jpg" alt="" class="photo-featured-cover">
            
            <h1 class="section-content-title">Kenya Safaris</h1>
            <div class="section-content-subtitle">
                <a href="">
                    All Safaris
                </a>
            </div>
            <div class="clearfix campaign-container">
                @foreach ($safaris as $safari)
                <a class="card-link" href="selected-safari">
                    <div class="left campaign">
                        
                            <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="campaign-cover"/>

                            <h6 class="campaign-title">
                                {{ ucwords($safari->name) }}
                            </h6>
                            <!-- <div class="clearfix">
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>

                                <span class="review">5.0</span>
                                <span class="review">(5)</span>
                            </div> -->
                            <p class="campaign-description">
                                {{ ucwords($safari->description) }}
                            </p>
                            <p class="day-card">
                            <i class="icon-clock fa fa-clock-o"></i>
                                7 Days
                            </p>
                            <p class="location-card">
                            <i class="icon-location fa fa-map-marker"></i>
                                Kenya
                            </p>
                            <span style="margin-right: -8px !important;" class="price-from">from</span>
                            <span class="price-card"> 
                                $ {{ ucwords($safari->price_from) }} per person
                            </span>
                    </div>  
                </a>
                
                @endforeach
            </div>
            <h1 class="section-content-title">Kenya Single-Day Safaris</h1>
            <div class="section-content-subtitle">
                <a href="">
                    All Safaris
                </a>
            </div>
            <div class="clearfix campaign-container">
                @foreach ($safaris as $safari)
                <a class="card-link" href="selected-safari">
                    <div class="left campaign">
                        
                            <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="campaign-cover"/>

                            <h6 class="campaign-title">
                                {{ ucwords($safari->name) }}
                            </h6>
                            <!-- <div class="clearfix">
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>

                                <span class="review">5.0</span>
                                <span class="review">(5)</span>
                            </div> -->
                            <p class="campaign-description">
                                {{ ucwords($safari->description) }}
                            </p>
                            <p class="day-card">
                            <i class="icon-clock fa fa-clock-o"></i>
                                7 Days
                            </p>
                            <p class="location-card">
                            <i class="icon-location fa fa-map-marker"></i>
                                Kenya
                            </p>
                            <span style="margin-right: -8px !important;" class="price-from">from</span>
                            <span class="price-card"> 
                                $ {{ ucwords($safari->price_from) }} per person
                            </span>
                    </div>  
                </a>
                
                @endforeach
            </div>
            <img src="images/bonobos-uganda.jpg" alt="" class="photo-featured-cover">
            <h1 class="section-content-title">Uganda Safaris</h1>
            <div class="section-content-subtitle">
                <a href="">
                    All Safaris
                </a>
            </div>
            <div class="clearfix campaign-container">
                @foreach ($safaris as $safari)
                <a class="card-link" href="selected-safari">
                    <div class="left campaign">
                        
                            <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="campaign-cover"/>

                            <h6 class="campaign-title">
                                {{ ucwords($safari->name) }}
                            </h6>
                            <!-- <div class="clearfix">
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>
                                <i class="card-icon fa fa-star"></i>

                                <span class="review">5.0</span>
                                <span class="review">(5)</span>
                            </div> -->
                            <p class="campaign-description">
                                {{ ucwords($safari->description) }}
                            </p>
                            <p class="day-card">
                            <i class="icon-clock fa fa-clock-o"></i>
                                7 Days
                            </p>
                            <p class="location-card">
                            <i class="icon-location fa fa-map-marker"></i>
                                Kenya
                            </p>
                            <span style="margin-right: -8px !important;" class="price-from">from</span>
                            <span class="price-card"> 
                                $ {{ ucwords($safari->price_from) }} per person
                            </span>
                    </div>  
                </a>
                
                @endforeach
                
            </div>
            <img src="images/giraffes-crossing.jpg" alt="" class="photo-featured-cover">
            <h1 class="section-content-title">Tanzania Safaris</h1>
            <div class="section-content-subtitle">
                <a href="">
                    All Safaris
                </a>
            </div>
            <div class="clearfix campaign-container">
                @if(count($safaris) > 0)
                    @foreach ($safaris as $safari)
                    <a class="card-link" href="selected-safari">
                        <div class="left campaign">
                            
                                <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="campaign-cover"/>

                                <h6 class="campaign-title">
                                    {{ ucwords($safari->name) }}
                                </h6>
                                <!-- <div class="clearfix">
                                    <i class="card-icon fa fa-star"></i>
                                    <i class="card-icon fa fa-star"></i>
                                    <i class="card-icon fa fa-star"></i>
                                    <i class="card-icon fa fa-star"></i>
                                    <i class="card-icon fa fa-star"></i>

                                    <span class="review">5.0</span>
                                    <span class="review">(5)</span>
                                </div> -->
                                <p class="campaign-description">
                                    {{ ucwords($safari->description) }}
                                </p>
                                <p class="day-card">
                                <i class="icon-clock fa fa-clock-o"></i>
                                    7 Days
                                </p>
                                <p class="location-card">
                                <i class="icon-location fa fa-map-marker"></i>
                                    Kenya
                                </p>
                                <span style="margin-right: -8px !important;" class="price-from">from</span>
                                <span class="price-card"> 
                                    $ {{ ucwords($safari->price_from) }} per person
                                </span>
                        </div>  
                    </a>
                    
                    @endforeach
                @else
                <a class="card-link" href="selected-safari">
                        <div class="left campaign">
                            <h6 class="campaign-title">
                                There are no safaris to display
                            </h6>
                        </div>  
                    </a>
                @endif    
            </div>
        </section>
    </body>
    <footer>
        <div class="clearfix" id="social-media">
            <h3 class="left">
                Follow us on social media
            </h3>
            <div class="social-media right">
                <a href="">
                    <i class="lni-facebook-filled"></i>
                </a>
                <a href="">
                    <i class="lni-twitter-original"></i>
                </a>
                <a href="">
                    <i class="lni-instagram-original"></i>
                </a>
            </div>
        </div>
        <div class="bottom-bar" id="bottom-bar">
            <div class="clearfix">
                <div class="left">
                    <img src="images/Barefoot-Adventure-Logo-White.png" alt="Barefoot adventures">
                </div>
                <div class="left">
                    <h4>Safaris</h4>
                    <ul>
                        <li><a href="">Kenya Safaris</a></li>
                        <li><a href="">Uganda Safaris</a></li>
                        <li><a href="">Tanzania Safaris</a></li>
                    </ul>
                </div>
                <div class="left">
                    <h4>Learn more</h4>
                    <ul>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="left">
                    <h4>About us</h4>
                    <ul>
                        <li><a href="">Contact us</a></li>
                        <li><a href="">Terms of Sevice</a></li>
                        <li><a href="">Privacy Policy</a></li>
                    </ul> 
                </div>
            </di>
        </div>
    </footer>
    <!-- jquery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-migrate-3.1.0.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ URL::asset('slick-1.8.1/slick/slick.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ URL::asset('js/home-layout.js')}}"></script>
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
</html>
