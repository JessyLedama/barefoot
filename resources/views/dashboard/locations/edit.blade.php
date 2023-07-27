@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">
@section('content')
<section class="clearfix">
    @include('dashboard.menu')

    <article class="card pull-right">
        <form action="{{ route('location.update', $location) }}" method="post" id="form" enctype="multipart/form-data">

            @if (session()->has('success'))
                <span class="alert alert-success">
                    {{ session()->get('success') }}
                </span>
            @endif

            @if (session()->has('failed'))
                <span class="alert alert-error">
                    {{ session()->get('failed') }}
                </span>
            @endif

            @csrf

            @method('PUT')

            <h4>Location Name</h4>

            <input type="text" placeholder="Name" value="{{ old('name', $location->name) }}" name="name" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h4>Location Description</h4>

            <input type="textarea" placeholder="Location Description" value="{{ old('description', $location->description) }}" name="description" required>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <h4>Location Cover</h4>

            <input type="file" placeholder="Location Cover" value="{{ old('cover', $location->cover) }}" name="cover" required>

            <img src="{{ asset('/storage/'.$location->cover) }}" width="150">

            @error('cover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit">Update</button>
        </form>

</section>
@endsection