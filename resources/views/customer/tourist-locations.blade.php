@extends('layouts/app-pages') 
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/location.css') }}">

@section('content')
<section class="container"> 
    <div>
        <img src="/images/antelopes-playing.jpg" alt="" class="photo-featured-cover photo-cover-pages">
                <h4 class="safari-cover-caption">
                    Top Tourist Attractions
                </h4>

        
        <div class="section-experiences">
            <a href="">
                {{ $locationCount }} Locations
            </a>
        </div>
        <h1 class="section-content-title">TOP TOURIST LOCATIONS</h1>
 
        <div class="row clearfix  location-container-page">
            @foreach ($touristLocations as $location)
            <a class="col-md-4 col-tourist-location-2" href="{{ url("/location/{$location->id}") }}">
                <div class="location">
                    <img src="{{ asset('/storage/'.$location->cover) }}" alt="location title" class="location-cover-page"/>

                    <h6 class="location-title-page">
                        {{ ucwords($location->name) }}
                    </h6>
                    
                    <span class="location-view-page">View</span>
                </div>  
            </a>
            @endforeach
        </div>
    </div>
</section>