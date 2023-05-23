@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/customer/booked.css') }}">


@section('content')
<section class="booked">
    <h3>Your Safari Has Been Booked</h3>

    <p>
        A confirmation message has been sent to your email.
    </p>

    <p>You will be contated by one of our repsresentatives soon.</p>

    <a href="/"> Back Home </a>
</section>
@endsection