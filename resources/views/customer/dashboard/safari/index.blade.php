@extends('layouts/app')
<link rel="stylesheet" href="{{ asset('css/customer/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer/safari/index.css') }}">

@section('title', 'Safaris | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('customer.dashboard.menu')

        <article class="card pull-right">
            <div id="safaris">
                <h4 class="desktop">
                    My Safaris
                </h4>

                <h4 class="mobile" id="card-header">
                    <a href="{{ route('customer.profile.menu') }}" id="back-to-menu">
                        <i class="lnr lnr-arrow-left"></i>
                    </a>

                    My Safaris
                </h4>
                
                @foreach ($safaris as $safari)
                    <div class="safari clearfix">
                        <div class="pull-left">
                            Safari No: {{ $safari->ordNo }} <br>
                            Status: {{ $safari->status }} <br>
                            Amount: Ksh. {{ number_format($safari->total + $safari->shippingCost) }}
                        </div>
                        <div class="manage-safari pull-right">
                            <a href="{{ route('customer.safari.show', $safari) }}">
                                <i class="lni-eye"></i>
                                View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
@endsection
