@extends('layouts/app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

@section('title', 'Edit Safari | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <form action="{{ route('safari.update', $safari) }}" method="post" id="form" enctype="multipart/form-data">

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

                <h4>Name</h4>

                <input type="text" placeholder="Name" value="{{ old('name', $safari->name) }}" name="name" required>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Slug</h4>

                <input type="text" placeholder="Slug" value="{{ old('slug', $safari->slug) }}" name="slug" required>

                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Price From</h4>
                <input id="regPrice" type="text" placeholder="Price From" value="{{ old('price_from', intval($safari->price_from)) }}" name="price_from">

                @error('price_from')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Residents Price</h4>
                
                <input id="salePrice" type="text" placeholder="Residents Price" value="{{ old('residents_price', intval($safari->residents_price)) }}" name="residents_price">

                @error('residents_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Non Residents Price</h4>
                
                <input id="salePrice" type="text" placeholder="Non Residents Price" value="{{ old('non_residents_price', intval($safari->non_residents_price)) }}" name="non_residents_price">

                @error('non_residents_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label>
                    <input type="checkbox" value="1" name="featured" {{ old('featured', $safari->featured) ? 'checked' : ''}}>

                    Popular Safari
                </label>

                <h4>Select Category</h4>

                <select name="categoryId" required>
                    @foreach ($categories as $Category)
                        <option value="{{ $Category->id }}" {{ $Category->id == old('categoryId', $safari->categoryId) ? 'selected' : ''}}>
                            {{ ucwords($Category->name) }} - {{ ucwords($Category->name) }}
                        </option>
                    @endforeach
                </select>

                <h4>Select subcategory</h4>

                <select name="subcategoryId" required>
                    @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == old('subcategoryId', $safari->subcategoryId) ? 'selected' : ''}}>
                            {{ ucwords($subCategory->name) }} - {{ ucwords($subCategory->category->name) }}
                        </option>
                    @endforeach
                </select>

                <h4>Overview</h4>
                
                <textarea id="shortDescription" name="shortDescription">&lt;p&gt;{{ old('shortDescription', $safari->shortDescription) }}&lt;/p&gt;</textarea>


                <h4>Change cover image</h4>

                <input type="file" name="cover" accept="image/*">

                <img src="{{ $safari->coverUrl }}" width="150">

                @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                @php 
                    $ge = explode('|', $safari->gallery);
                @endphp
                
                <h4>Change gallery</h4>

                <input type="file" name="gallery[]" accept="image/*">
                @foreach($ge as $g)
                    <img src="{{ asset('/storage/'.$g) }}" width="150">
                @endforeach
                
                @error('gallery')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Additional Info</h4>
                
                <textarea id="description" name="description">&lt;p&gt;{{ old('description', $safari->description) }}&lt;/p&gt;</textarea>

                @include('dashboard.seo', [

                'title' => $safari->seo->title ?? '',
                'keywords' => $safari->seo->keywords ?? '',
                'description' => $safari->seo->description ?? ''
                ])

                <h4>Included</h4>
                <label>
                    <input type="checkbox" value="1" name="entry_fee" {{ old('entry_fee', $safari->entry_fee) ? 'checked' : ''}}>

                    Entry Fee
                </label>

                <label>
                    <input type="checkbox" value="1" name="transport" {{ old('transport', $safari->transport) ? 'checked' : ''}}>

                    Transport
                </label>

                <label>
                    <input type="checkbox" value="1" name="tour_guide" {{ old('tour_guide', $safari->tour_guide) ? 'checked' : ''}}>

                    Tour Guide
                </label>

                <label>
                    <input type="checkbox" value="1" name="drinks" {{ old('drinks', $safari->drinks) ? 'checked' : ''}}>

                    Drinks
                </label>

                <label>
                    <input type="checkbox" value="1" name="lunch" {{ old('lunch', $safari->lunch) ? 'checked' : ''}}>

                    Lunch
                </label>

                <label>
                    <input type="checkbox" value="1" name="dinner" {{ old('dinner', $safari->dinner) ? 'checked' : ''}}>

                    Dinner
                </label>

                <label>
                    <input type="checkbox" value="1" name="accomodation" {{ old('accomodation', $safari->accomodation) ? 'checked' : ''}}>

                    Accomodation
                </label>


                <h4>Location</h4>
                
                <input id="salePrice" type="text" placeholder="Location Name" value="{{ old('location', $safari->location) }}" name="location">

                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                @php 
                    $iImage = explode('|', $safari->itinerary_image);
                    $iDay = explode('|', $safari->itinerary_day);
                    $iDescription = explode('|', $safari->itinerary_description);
                    $tActivities = explode('|', $safari->trip_activities_description);

                @endphp

                <h4> Itinerary Day </h4>
                
                @foreach($itineraryDay as $id)
                    <input type="text" name="itinerary_day[]" value="{!! old('$id', $id) !!}" placeholder="Itinerary Day">
                @endforeach
                
                @error($itineraryDay)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4> Itinerary Description </h4>
                
                @foreach($itineraryDescription as $ide)
                    <textarea class="ckeditor" name="itinerary_description[]" placeholder="Itinerary Description">
                        &lt;p&gt; {{ old('$ide', $ide) }} &lt;/p&gt;
                    </textarea>
                @endforeach
                
                @error($itineraryDescription)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4> Trip Activities Description </h4>
                
                @foreach($tripDescription as $td)
                    <textarea id="tripDescription" name="trip_activities_description[]" placeholder="Trip Activities Description">
                        &lt;p&gt; {{ old('$td', $td) }} &lt;/p&gt;
                    </textarea>
                @endforeach
                
                @error($tripDescription)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                

                <safari-gallery></safari-gallery>

                <button type="submit">Update</button>
            </form>
        </article>
    </section>
@endsection

@section('components')
    <template id="safari-gallery-template">
        <div>
            <h4>Gallery</h4>

            <input type="file" name="gallery[]" accept="image/*" multiple>

            <div class="gallery-image" v-for="(image, index) in gallery" :key="index">

                <img :src="image.url" width="150">
    
                <a @click="deleteFromGallery(image.id)">
                    Delete
                </a>
    
            </div>
        </div>
    </template>
@endsection

<script>
$(document).ready(function() {
  var max_fields = 15; //maximum input boxes allowed
  var wrapper = $(".itinerary-data"); //Fields wrapper
  var add_button = $(".clone-button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault();
    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      var editorId = 'editor_' + x;
      $(wrapper).append('<div> <h4 style="margin-top: 20px;">Itinerary Day</h4> <input type="text" placeholder="Itinerary Day" value="{{ old('itinerary_day', $itinerary_day ?? '') }}" name="itinerary_day[]"> <h4 style="margin-top: 20px;">Itinerary Description</h4> <textarea id="' + editorId + '" class="ckeditor" name="itinerary_description[]"></textarea><a href="#" class="remove_field">Remove</a></div>'); //add input box

      CKEDITOR.replace(editorId, {
        height: 200
      });
    } 
  });

  CKEDITOR.replace(shortDescription, {
        height: 200
      });

    CKEDITOR.replace(description, {
    height: 200
    });

    

    CKEDITOR.replace(tripDescription, {
        height: 200
      });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
</script>