@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer/booked.css') }}">

@section('content')

<article class="card pull-right booking booking-card">
            <form action="{{ route('booking.store') }}" method="post" id="form" enctype="multipart/form-data">

                @csrf

                <h4 class="mobile">
                    Book Safari
                </h4>
                
                <h1 class="campaign-goal" id="campaign-fund-total-goal">
                    <span class="safari-title" name="safariTitle">{{ ucwords($safari->name) }}</span>
                </h1>
                
                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>First Name</h4>

                        <input type="text" placeholder="First Name" value="{{ old('firstName') }}" name="firstName" required>
        
                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pull-right">
                        <h4>Last Name</h4>

                        <input type="text" placeholder="Last Name" value="{{ old('lastName') }}" name="lastName" required>
        
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Email</h4>
                        
                        <input id="price"  type="text" placeholder="Email" value="{{ old('email') }}" name="email">
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pull-right">
                        <h4>Phone</h4>
                        
                        <input id="salePrice" type="text" placeholder="Phone" value="{{ old('phone') }}" name="phone">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <h4>Number of People</h4>
                <div class="input-group clearfix">
                    <div class="pull-left">
                        <span>Adults</span>
                        <input class="no-of-people" id="adults" type="text" placeholder="" value="{{ old('adults') }}" name="adults">

                        @error('adults')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="pull-left children">
                        <span>Children (2-12 years)</span>
                        <input class="no-of-people" id="children" type="text" placeholder="" value="{{ old('children') }}" name="children">

                        @error('children')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="pull-left">
                        <span>Infants (under 2 years)</span>
                        <input class="no-of-people" id="infants" type="text" placeholder="" value="{{ old('infants') }}" name="infants">

                        @error('infants')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group-clearfix">
                    <h4>Citizenship</h4>
                    <label>
                        <input onclick="myFunction()" id="itinerary" type="radio" value="true" name="citizenship" {{ old('radio') == true ? 'checked' : ''}} checked>

                        Citizen 
                        <br />
                        <input onclick="myFunction()" id="itinerary" type="radio" value="true" name="citizenship" {{ old('radio') == true ? 'checked' : ''}}>
                        Resident
                        <br />
                        <input onclick="myFunction()" id="itinerary" type="radio" value="true" name="citizenship" {{ old('radio') == true ? 'checked' : ''}}>
                        Non Resident
                    </label>
                </div>
                
                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Country</h4>
                        <input id="country"  type="text" placeholder="Country" value="{{ old('country') }}" name="country">
        
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="pull-left additional-notes">
                        <h4>Additional Notes</h4>
                        
                        <textarea name="additionalNotes" id="additionalNotes">
                            {{ old('additionalNotes') }}
                        </textarea>
                    </div>
                </div>

                <div class="input-group clearfix">
                    <div class="pull-left">
                        
                        <input id="safari"  type="text" placeholder="Safari" value="{{ ucwords($safari->name) }}" name="safariId" style="display:none">

                        @error('safariId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit">Book</button>
            </form>
        </article>

@endsection

