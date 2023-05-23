@extends('layouts/app-pages')

@section('content')
<section class="container">
    <div>
        <img src="/images/Lion-Photo.jpg" alt="" class="photo-featured-cover">
        
        <div class="section-experiences">
            <a href="">
                {{ $galleryCount }} Photos
            </a>
        </div>
        <h1 class="section-content-title">GALLERY</h1>
        
        <div class="row gallery-container">
            @foreach ($galleryPhotos as $safari)
            <div class= "col-md-4 cover-left">
                <img src="{{ asset('/storage/'.$safari->cover) }}" alt="" class="gallery-list"/>
            </div>
            @endforeach
        </div>
    </div>
</section>