@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


@section('title', 'Edit Safari Price | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <form action="{{ route('safari.update', $safari) }}" method="post" id="form">

                @if (session()->has('success'))
                    <span class="alert alert-success">
                        {{ session()->get('success') }}
                    </span>
                @endif

                @csrf
        
                @method('PUT')

                <div class="input-group">
                    <div class="pull-left">
                        <h4>Name</h4>

                        <div class="input-group" id="name-group">
                            <input type="text" placeholder="Name" value="{{ old('name', $safari->name) }}" name="name" required>
                        </div>
                    </div>

                    <div class="pull-left">
                        <h4>Slug</h4>

                        <div class="input-group" id="name-group">
                            <input type="text" placeholder="Slug" value="{{ old('slug', $safari->slug) }}" name="slug" required>
                        </div>
                    </div>

                    <div class="pull-left">
                        <h4>Price From</h4>

                        <div class="input-group" id="name-group">
                            <input type="text" placeholder="Price From" value="{{ old('price_from', $safari->price_from) }}" name="price_from" required>
                        </div>
                    </div>

                    <div class="pull-right">
                        <h4>Residents Price</h4>

                        <input type="text" placeholder="Residents Price" value="{{ old('residents_price', $safari->residents_price) }}" name="residents_price" required>
                    </div>

                    <div class="pull-left">
                        <h4>Non Residents Price</h4>

                        <div class="input-group" id="name-group">
                            <input type="text" placeholder="Non Residents Price" value="{{ old('non_residents_price', $safari->non_residents_price) }}" name="non_residents_price" required>
                        </div>
                    </div>
                </div>

                <h4>Overview</h4>

                <textarea id="shortDescription" placeholder="Overview" name="shortDescription">{{ old('shortDescription', $safari->shortDescription) }}</textarea>


                <h4>Additional Info</h4>

                <textarea id="description" placeholder="Description" name="description">{{ old('description', $safari->description) }}</textarea>

                <button type="submit">Update</button>
            </form>
        </article>
    </section>
@endsection

<script>
    $(document).ready(function(){
        
        CKEDITOR.replace(shortDescription, {
            height: 200
        });

        CKEDITOR.replace(description, {
        height: 200
        });

    });
</script>