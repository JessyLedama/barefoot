@extends('layouts.app-pages')
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/rates.css') }}">

@section('content')
    <h1 class="rates-content-title">
        Uganda Safaris Rates (Non-Residents)
    </h1>

    <section id="kenya-local-rates" class="clearfix">
        <div class="clearfix rates-container">
            @foreach ($rates as $safari)
            <a class="rates-link" href="{{ url("/safaris/{$safari->id}") }}"> 
                <div class="rates">
                    <div class="rates-title">
                        {{ ucwords($safari->name) }}
                    </div>
                        -

                    <span>Ksh {{ ucwords($safari->non_residents_price) }}</span>
                </div>  
            </a>
            @endforeach
        </div>

        <div class="row desktop">
            <div class="col-md-4 extra-content">
                <ul class="extra-list">
                    <h1 class="extras">
                        Includes:
                    </h1>
                    <li> Transport in a Land Cruiser </li>
                    <li> Game Drives </li>
                    <li> Meals on Full Board </li>
                    <li> Bottle of water per day </li>
                </ul>
            </div>

            <div class="col-md-4 extra-content">
                <ul class="extra-list">
                    <h1 class="extras">
                        Excludes:
                    </h1>
                    <li> Park Fees (Except Kenya Safaris) </li>
                    <li> Drinks </li>
                    <li> Any other things not mentioned above </li>
                </ul>
            </div>
        </div>

        <div class="mobile">
            <div class="extra-content">
                <ul>
                    <h1 class="extras">
                        Includes:
                    </h1>
                    <li> Transport in a Land Cruiser </li>
                    <li> Game Drives </li>
                    <li> Meals on Full Board </li>
                    <li> Bottle of water per day </li>
                </ul>
            </div>

            <div class="extra-content">
                <ul>
                    <h1 class="extras">
                        Excludes:
                    </h1>
                    <li> Park Fees (Except Kenya Safaris) </li>
                    <li> Drinks </li>
                    <li> Any other things not mentioned above </li>
                </ul>
            </div>
        </div>
    </section>
@endsection