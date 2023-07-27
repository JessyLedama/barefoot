@extends('layouts/app-pages')
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/location.css') }}">

@section('content')
<!-- gallery -->
<section class="lo-container">
    
    <div>
        <img src="{{ asset('/storage/'.$location->cover) }}" alt="" class="lo-cover">
    </div>
    
    <div id="campaign-intro" class="left">
        <h1 class="lo-title">{{ ucwords($location->name) }}</h1>

        <div id="additional-info" class="campaign-tab-content">
            <p>
                {{ ucwords($location->description) }}
            </p>
        </div>
        
    </div>

</section>