@extends('layouts/app-pages') 
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/safaris.css') }}">
@section('content')
<section class="container"> 
<div>
    <img src="images/antelopes-playing.jpg" alt="" class="photo-cover-pages">
            <h4 class="safari-cover-caption">
                Kenya Safaris 
            </h4>

    
    <div class="section-experiences">
        <a href="">
            {{ $kenyaSafarisCount }} Experiences
        </a>
    </div>
    <h1 class="section-content-title">KENYA SAFARIS</h1>

    <div class="row">
        <div class="col-md-6 button locala">
            <a href="/kenya-local-safaris/"> Local Safaris </a>
        </div>

        <div class="col-md-6 button localb">
            <a href="/kenya-multiple-day-safaris/"> Multiple Day Safaris </a>
        </div>
    </div>

    @foreach ($kenyaSafaris as $safari)
    <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}">
            <div class="left campaign campaign-safaris">
                
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
                @php 
                    $safarii = html_entity_decode($safari->shortDescription);
                    $safarii = strip_tags($safarii);
                @endphp
                <p class="campaign-description">
                    {{ ucwords($safarii) }}
                </p>
                <!-- <p class="day-card">
                <i class="icon-clock fa fa-clock-o"></i>
                    7 Days
                </p> -->
                <p class="location-card">
                <i class="icon-location fa fa-map-marker"></i>
                    {{ ucwords($safari->location) }}
                </p>
            
                    <span class="price-from pr{{$safari->price_from}}">from</span> <br class="for-mobile"/>
                    <span class="price-card pr{{$safari->price_from}}">Ksh{{ ucwords($safari->price_from) }}</span>
                    <span class="per-person pr{{$safari->price_from}}">per person</span> <br class="for-mobile"/>
                    <span class="campaign-view">View</span>

                    {{ $safari->subcategory }}
            </div>  
        </a>
    @endforeach

    </div>
</section>