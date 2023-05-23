@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/about-us.css') }}">


@section('content')
<section class="container">
    <img src="/images/about-us-cover.jpg" alt="" class="cover">
            <h4 class="about-us-caption">
                About Barefoot Adventures
            </h4>
    <div class="row"> 
        <div class="col-sm-5">
            <img src="/images/giraffe-tall-side.jpg" alt="Barefoot Adventures" class="card-img" alt="about"/>
        </div>
        <div class="col-sm-7">
            <div class="card-body about-body">
                <h5 class="card-title"> Tours and Travel </h5>
                <p class="card-text">
                    Whether you are taking your first steps into the realm of
                    the outdoors, or are a seasoned
                    adventurer, I believe you will find the quality the
                    experience offered by Barefoot
                    Adventures Africa irresistible.
                </p>
                <p class="card-text">
                    We  arrange tour  Safaris to Kenya, Tanzania, Uganda and
                    Rwanda. You can create your own itinerary by specifying your
                    interests as well as the time and budget.We are here to help
                    you find your perfect safari – whatever your budget, 
                    wishlist or preferred travel style.
                    Making favourable itinerary is our pride. As we excel in
                    making best safari packages to accommodate your budget.
                    Our expert tour operators staff are on the alert to make
                    your trip a most favourable and remembered adventure.
                    Don't hesitate, come and discover what Africa holds!

                </p>
                <h5 class="card-title"> Local Deals </h5>
                <p class="card-text">
                    We offer budget friendly local adventure deals across Kenya.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection