@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">
@section('title', 'Add Location | ' . config('app.name'))

@section('content')
<section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <form action="{{ route('location.store') }}" method="post" id="form" enctype="multipart/form-data">

                @csrf

                <h4 class="mobile">
                    <a href="{{ route('dashboard.menu') }}" id="back-to-menu">
                        <i class="lnr lnr-arrow-left"></i>
                    </a>
    
                    Add Tourist Location
                </h4>

                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Location Name</h4>

                        <input type="text" placeholder="Location Name" value="{{ old('name') }}" name="name" required>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>      
                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Location Description</h4>

                        <input type="textarea" placeholder="Location Description" value="{{ old('description') }}" name="description" required>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Location Cover</h4>

                        <input type="file" placeholder="Location Cover" value="{{ old('cover') }}" name="cover" required>
        
                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <button> Save </button>
        </form>      

</section>
@endsection