@extends('layouts.app-pages')

@section('content')
<!-- <div id="first-page-preloader">
        <img src="{{ asset('images/Barefoot-Adventure-Logo.png') }}" alt="Barefoot Adventures">

        <div id="line-preloader"></div>
</div> -->
<!-- 
    <home></home> -->


<!-- Slideshow -->
<section>
    <div id="home-slideshow">
        <div class="home-featured">
            <img src="images/Lion-Photo.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>The African male Lion crossing a path</small>
            </h4> -->
        </div>
        <div class="home-featured">
            <img src="images/Maasai-Community.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>The Maasai community</small>
            </h4> -->
        </div>
        <div class="home-featured">
            <img src="images/Wildbeest-migration.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>The great Wildbeest Migration</small>
            </h4> -->
        </div>
        <div class="home-featured">
            <img src="images/Mt-kilimanjaro-view.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>Mt. Kilimanjaro view</small>
            </h4> -->
        </div>
        <div class="home-featured">
            <img src="images/Elephant-herd.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>Herd of elephants cuddling</small>
            </h4> -->
        </div>
        <div class="home-featured">
            <img src="images/Beach-Photo.jpg" alt="" class="home-featured-cover">
            <!-- <h4 class="home-featured-caption">
                <small>Indian Ocean Sandy Beach</small>
            </h4> -->
        </div>
    </div>

    <div class="home-featured-caption">
        <h4 class="home-featured-caption-1">Discover what 
        <small class="home-featured-caption-2">Africa</small> holds.
        </h4>
        <h4 class="home-caption-small"> We arrange tour Safaris to Kenya, Tanzania, Uganda and Rwanda. </h4>
    </div>
</section>

<section class="container data-container">
        
    <h1 class="section-content-title">
        POPULAR SAFARIS
    </h1>
    
    <!-- popular safaris -->
    <div class="clearfix campaign-container">
        @foreach ($featuredSafaris as $safari)
        <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}"> 
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
                @php 
                    $safarii = html_entity_decode($safari->description);
                    $safarii = strip_tags($safarii); 

                    $it = explode('|', $safari->itinerary);   
                @endphp

                <p class="campaign-description">
                    {{ ucwords($safarii) }}
                </p>
                <p class="day-card">
                <!-- <i class="icon-clock fa fa-clock-o"></i>
                    7 Days 
                </p> -->
                <p class="location-card">
                <i class="icon-location fa fa-map-marker"></i>
                    {{ ucwords($safari->location) }}
                </p>
            
                    <span class="price-from pr{{$safari->price_from}}">from</span> <br class="for-mobile"/>
                    <span class="price-card pr{{$safari->price_from}}">Ksh{{ ucwords($safari->price_from) }}</span>
                    <span class="per-person pr{{$safari->price_from}}">per person</span> 
                    <br class=""/>
                    <span class="campaign-view">View</span>
            </div>  
        </a>
        @endforeach
    </div>

    <!-- Kenya Safaris photo -->
    <div class="photo-featured-1">
        <img src="images/leopard-sneaking.jpg" alt="" class="photo-featured-cover">
    </div>
    <div class="photo-caption">
        <h4 class="photo-caption-1"> Kenya Safaris </h4>
        <h4 class="photo-caption-2"> Experience  Kenya safari from the legendary Maasai Mara to its pristine coastlines with tropical beaches </h4>
    </div>

    <h1 class="section-content-title">Kenya Local Safaris</h1>
    <div class="section-content-subtitle">
        <a href="{{ url("/kenya-local-safaris/") }}">
            All Kenya Day-Trip Safaris
        </a>
    </div>

    <!-- Kenya Day-Trip Safaris -->
    <div class="clearfix campaign-container">
        @foreach ($kenyaLocalSafaris as $safari)
        <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}">
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
                @php 
                    $safarii = html_entity_decode($safari->description);
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

    <!-- Multi-Day Safaris Title -->
    <h1 class="section-content-title">Kenya Multiple Day Safaris</h1>
    <div class="section-content-subtitle">
        <a href="{{ url("/kenya-multiple-day-safaris/") }}">
            All Kenya Multiple Day Safaris
        </a>
    </div>

    <!-- Kenya Multi Day Safaris -->
    <div class="clearfix campaign-container">
        @foreach ($kenyaMultipleDaySafaris as $safari)
        <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}">
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
                @php 
                    $safarii = html_entity_decode($safari->description);
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

    <!-- Uganda safaris title -->
    <div class="photo-featured-2">
    <img src="images/bonobos-uganda.jpg" alt="" class="photo-featured-cover">
    </div>
    <div class="photo-caption">
        <h4 class="photo-caption-1"> Uganda Safaris </h4>
        <h4 class="photo-caption-2"> Uganda is a destination ripe with adventure-from primate trekking in the forest to viewing stunning cascades at Sipi Falls or Murchinson Falls. </h4>
    </div>

    <h1 class="section-content-title">Uganda Safaris</h1>
    <div class="section-content-subtitle">
        <a href="{{ url("/uganda-safaris/") }}">
            All Safaris
        </a>
    </div>

    @if(!empty($ugandaSafaris))
    <!-- Uganda Safaris -->
    <div class="clearfix campaign-container">
        @foreach ($ugandaSafaris as $safari)
        <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}">
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
                @php 
                    $safarii = html_entity_decode($safari->description);
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
    @endif

    <!-- Tanzania safaris title -->
    <div class="photo-featured-3">
    <img src="images/giraffes-crossing.jpg" alt="" class="photo-featured-cover">
    </div>
    <div class="photo-caption">
        <h4 class="photo-caption-1"> Tanzania Safaris </h4>
        <h4 class="photo-caption-2"> Experience Tanzania's natural splendor form the great Wildbeeste Migration in Serengeti to hiking the tallest mountain in Africa, Mt Kilimanjaro  </h4>
    </div>

    
    <h1 class="section-content-title">Tanzania Safaris</h1>
    <div class="section-content-subtitle">
        <a href="{{ url("/gallery/") }}">
            All Safaris
        </a>
    </div>

    @if(!empty($tanzaniaSafaris))
    <!-- Tanzania safaris -->
    <div class="clearfix campaign-container">
        @foreach ($tanzaniaSafaris as $safari)
        <a class="card-link" href="{{ url("/safaris/{$safari->id}") }}">
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
                @php 
                    $safarii = html_entity_decode($safari->description);
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
    @endif

    <!-- Top tourist locations -->
    <div class="locations-background"> 
        <div class="row location-header">
            <h1 class="location-content-title">Top Tourist Attractions</h1>
            <div class="location-content-subtitle">
                <a href="{{ url("/tourist-locations/") }}">
                    All Locations
                </a>
            </div>
        </div>

        <div class="row clearfix location-container">
            @foreach ($locations as $safari)
            <a class="col-md-4 col-tourist-location" href="{{ url("/location/{$safari->id}") }}">
                <div class="location">
                    
                    <img src="{{ asset('/storage/'.$safari->cover) }}" alt="campaign title" class="location-cover"/>

                    <h6 class="location-title">
                        {{ ucwords($safari->name) }}
                    </h6>

                    <h6 class="location-view">View</h6>
                </div>  
            </a>
            @endforeach
        </div>
    </div>
    
    <!-- Gallery -->
    <h1 class="section-content-title">Gallery</h1>
    <div class="section-content-subtitle">
        <a href="{{ url("/gallery/") }}">
            All Photos
        </a>
    </div>

    <div class="row clearfix gallery-container">
        @foreach ($gallery as $safari)
        <a class="col-md-4 col-gallery" href="{{ url("/gallery/{$safari->id}") }}">
            <div class="location">
                <img src="{{ asset('/storage/'.$safari->cover) }}" alt="gallery-image" class="gallery-cover"/>
            </div>  
        </a>
        @endforeach
    </div>
</section>
@endsection

</body>
