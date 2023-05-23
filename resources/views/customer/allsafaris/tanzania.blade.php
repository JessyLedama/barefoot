@extends('layouts/app-pages')

@section('content')
<section class="container">
<div>
    <img src="/images/lions-hunting.jpg" alt="" class="photo-cover-pages">
    <h4 class="safari-cover-caption">
        Tanzania Safaris
    </h4>

    
    <div class="section-experiences">
        <a href="">
            {{ $tanzaniaSafarisCount }} Experiences
        </a>
    </div>
    <h1 class="section-content-title">TANZANIA SAFARIS</h1>

    @foreach ($tanzaniaSafaris as $safari)
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
            </div>  
    </a>
    @endforeach

    </div>
</section>