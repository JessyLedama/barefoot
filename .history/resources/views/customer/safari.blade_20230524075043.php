@extends('layouts/app-pages') 
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/campaign-page.css') }}">

@section('content')
<!-- gallery -->
<section id="campaign-gallery" class="clearfix">
   
    <div class="left">
        <img src="{{ asset('/storage/'.$safari->cover) }}" alt="">
    </div>
    <div class="right container">
        <div class="clearfix"> 
            @php
                $gallery = explode("|", $safari->gallery);
                $everythingIt = $itinerary;
                $countGallery = count($gallery);
                $more = $countGallery - 4;
            @endphp 
            

            @for( $g = 0; $g < $countGallery; $g++)
                <div>
                    <img id="@php echo $g @endphp" src="{{ asset('/storage/'.array_values($gallery)[$g]) }}" alt="@php echo $g @endphp" class=" left">
                </div> 
                <div id="galleryModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="slides">
                        <img id="@php echo $g @endphp" src="{{ asset('/storage/'.array_values($gallery)[$g]) }}" alt="@php echo $g @endphp" class=" left">
                    </div>
                </div>  
            @endfor
        </div>
        <div>
            
        </div>
    </div>
</section>

<!-- content -->
<section class="clearfix" id="campaign-content">
    
    <div id="campaign-intro" class="left">
        <h4 id="campaign-title">{{ ucwords($safari->name) }}</h1>
        
        <!-- <div class="clearfix">
            <i class="selected-icon fa fa-star"></i>
            <i class="selected-icon fa fa-star"></i>
            <i class="selected-icon fa fa-star"></i>
            <i class="selected-icon fa fa-star"></i>
            <i class="selected-icon fa fa-star"></i>
            <span class="review">5.0</span>
            <span class="review">(5)</span>
        </div> -->

        <div>
            <i class="more-info fa fa-clock-o">
                <br /> 
                <span class="more-info-text">
                    Duration
                </span> 
                <br /> 
                <span class="more-details">8 Days</span>
            </i>
            <i class="more-info fa fa-map-marker">
                <br /> 
                <span class="more-info-text">Location</span> 
                <br /> 
                <span class="more-details">{{ ucwords($safari->location) }}</span>
            </i>
            <i class="more-info fa fa-list">
                <br /> <span class="more-info-text">Includes</span> 
                <br /> <span class="more-details"></span>
            </i>    
            
        </div>

        <div id="campaign-share-social">
            <a href="">
                <i class="ti-facebook"></i>
                Share
            </a>

            <a href="">
                <i class="ti-twitter"></i>
                Tweet
            </a>

            <a href="">
                <i class="ti-linkedin"></i>
                Share
            </a>
            <br class="br-whatsapp"/>
            <a href="">
                <i class="fa fa-whatsapp"></i>
                Whatsapp
            </a>
        </div>
       
    </div>


    <div id="campaign-fund-stats" class="right">
        <h1 class="campaign-goal" id="campaign-fund-total-goal">
            <span>{{ ucwords($safari->name) }}</span>
        </h1>

        <h1 id="campaign-fund-investors">
            <small class="cost pr{{$safari->price_from}}">from</small>
            <small class="price-tag pr{{$safari->price_from}}">from {{ ucwords($safari->price_from) }}</small>
            <small class="cost pr{{$safari->price_from}}">per person</small>
        </h1>

        <div class="button-wrapper">
            <a href="{{ url("/booking/{$safari->id}") }}" id="campaign-invest-btn">
                BOOK NOW
            </a>
        </div>
    </div>

</section>

<ul id="campaign-navigation">
    <li><a href="#campaign-overview" class="campaign-nav-link">Overview</a></li>
    <li><a href="#campaign-itinerary" class="campaign-nav-link">Itinerary</a></li>
    <li><a href="#additional-info" class="campaign-nav-link">Additional Info</a></li>
    <li><a href="#campaign-map" class="campaign-nav-link">Map</a></li>
    <li><a href="#campaign-reviews" class="campaign-nav-link">Reviews</a></li>
</ul>

<section id="campaign-tabs">

    <div id="campaign-overview" class="campaign-tab-content">

        <h2>Overview</h2>

        <p>
            {!! ucwords($safari->shortDescription) !!}
        </p>
    </div>
    
    <div id="campaign-itinerary" class="campaign-tab-content">
        @php 
            if($everythingIt != null){
                    $day = explode('|', $everythingIt->itinerary_day);
                    $image = explode('|', $everythingIt->itinerary_image);
                    $description = explode('|', $everythingIt->itinerary_description);
                    $trActivities = explode('|', $itinerary->trip_activities_description);
                    
                    $count = count($day);
                } else{
                    $count = "no";
                    $trActivities = [];
            }
        @endphp

        <h2>Itinerary</h2>
        @if(!empty($everythingIt))
            @for( $i = 0; $i < $count; $i++)
            <div id='itd@php echo $day[0] @endphp' class="it_day clearfix">
                
                <h2 style="margin-bottom:0">
                    Day
                    @php
                        echo array_values($day)[$i];
                    @endphp
                </h2>
                <i class="fa fa-circle"></i>
                
                <div class="vert-rule">
                    <div class="campaign-team-member left">
                        <div class="clearfix">
                            
                            <div class="itinerary-text"> 
                                @php
                                    echo array_values($description)[$i];
                                @endphp
                            </div>  
                                                
                        </div> 
                    </div>
                </div>
            </div>
            @endfor
        

        <div id='tr@php echo $trActivities[0] @endphp' class="trip-activities">
            <h2>Trip Activities</h2> 
            {!! ucwords($itinerary->trip_activities_description) !!}
        </div>
            
        <div id="additional-info" class="campaign-tab-content">

            <h2>Additional Info</h2>

            <p>
                {!! ucwords($safari->description) !!}
            </p>
        </div>
        @endif
    </div>
</section>

<script>
    document.getElementById('it').style.display = "none";
    document.getElementById('itd').style.display = "none";
</script>

<script>
    document.getElementById('tr').style.display = "none";
</script>