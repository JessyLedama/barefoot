@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/customer/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('css/customer/order/show.css') }}">

@section('title', 'View Order | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('customer.dashboard.menu')
        
        <article class="card pull-right">
            <a href="{{ route('customer.order') }}">
                <i class="lni-arrow-left"></i>
                Back to safaris
            </a>
            <div class="clearfix">
                <div class="pull-left" id="order-details">
                    <h3>Order details</h3>
                    <span>
                        Order No: {{ $order->ordNo }}
                    </span>
                    <span>
                        Status: {{ $order->status }}
                    </span>
                    <span>
                        Delivery Cost: Ksh {{ $order->shippingCost }}
                    </span>
                    <span>
                        Total: Ksh {{ number_format($order->total) }}
                    </span>
                    <span>
                        Amount: Ksh {{ number_format($order->total + $order->shippingCost) }}
                    </span>
                    <span>
                        Date: {{ $order->created_at->format('F j, Y') }}
                    </span>
                </div>
                <div class="pull-right" id="address">
                    <h3>Delivery address</h3>
                    <span>
                        Phone: {{ $order->address->phone ?? '-' }}
                    </span>
                    <span>
                        County: {{ $order->address->county ?? '-' }}
                    </span>
                    <span>
                        Town: {{ $order->address->town ?? '-' }}
                    </span>
                    <span>
                        Street: {{ $order->address->street ?? '-' }}
                    </span>
                </div>
            </div>
            
        </article>
    </section>
@endsection
