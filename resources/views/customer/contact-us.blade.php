@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">

@section('content')
<section class="container">
        <img src="/images/about-us-cover.jpg" alt="" class="contact-cover">
                <h4 class="contact-us-caption">
                    Contact Us
                </h4>
    <div class="row">

        <div class="contact-card col-md-4">
            <h3> Contacts </h3>
            <span class="fa fa-envelope" style="padding-top: 5px"></span> Email
                <p>info@barefootadventures.africa </p>
            <span class="fa fa-globe" style="padding-top: 5px"></span> Website
                <p>www.barefootadventures.africa</p> 
            <span class="fa fa-phone" style="padding-top: 5px"></span> Phone
                <p>+31616-950-384 | +31626-757-555 </p> 
            <span class="fa fa-map-marker" style="padding-top: 5px"></span> Location
                <p>Muthaiga Shopping Centre, 3rd floor, Limuru Road, Nairobi Kenya</p>
        </div>

        <div class="adventure col-md-6">
            <h3> Your Adventure Starts Here </h3>
            <p>
                Email your holiday ideas and queries and we'll get back to you as soon as we can.
            </p>
            <p>
                Visit our office at Muthaiga Mini Market, Limuru Road in Nairobi, Kenya and discuss your holiday plans with one of our travel consultants - there's not better way to plan your perfect holiday than to discuss your plan face to face with our team.
            </p>
            <p> OUR LOCATION </p>
            <p>
                Muthaiga Shopping Center, 3rd Floor, Limuru Road, Nairobi, Kenya
            </p>
        </div>
    </div>
    
    <div class="row">
        <div class="quiz col-md-12">
            <h2>Have Some Questions?</h2>
        </div>
        <div class="envelope col-sm-6">
            <span class="fa fa-envelope"></span>
        </div>
        <div class="contact-form col-sm-6">
            <form action="{{ url('contact-us') }}" method="post" id="form" enctype="multipart/form-data">
                @csrf
                <div class="questions">
                    <div>
                        <input type="text" placeholder="First Name" value="{{ old('name') }}" name="name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" placeholder="Last Name" value="{{ old('name') }}" name="name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input type="email" placeholder="Email" value="{{ old('email') }}" name="email" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input type="textarea" placeholder="Leave a message" value="{{ old('feedback') }}" name="feedback" required>

                        @error('feedback')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection