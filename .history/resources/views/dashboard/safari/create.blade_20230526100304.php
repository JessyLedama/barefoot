@extends('layouts.app-pages')
<link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/form.css') }}">

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


@section('title', 'Add Safari | ' . config('app.name'))

@section('content')
    <section class="clearfix">
        @include('dashboard.menu')

        <article class="card pull-right">
            <form action="{{ route('admin.safaris.store') }}" method="post" id="form" enctype="multipart/form-data">

                @csrf

                <h4 class="mobile">
                    <a href="{{ route('admin.safaris.store') }}" id="back-to-menu">
                        <i class="lnr lnr-arrow-left"></i>
                    </a>
    
                    Add safari
                </h4>

                <div class="input-group clearfix">
                    <div >
                        <h4>Name</h4>

                        <input type="text" placeholder="Name" value="{{ old('name') }}" name="name" required>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group clearfix">
                    <div class="pull-left">
                        <h4>Price From</h4>
                        
                        <input id="price"  type="text" placeholder="Price From" value="{{ old('price_from') }}" name="price_from">
        
                        @error('price_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pull-right">
                        <h4>Residents price</h4>
                        
                        <input id="salePrice" type="text" placeholder="Residents Price" value="{{ old('residents_price') }}" name="residents_price">

                        @error('residents_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pull-left">
                        <h4>Non Residents price</h4>
                        
                        <input id="salePrice" type="text" placeholder="Non Residents Price" value="{{ old('non_residents_price') }}" name="non_residents_price">

                        @error('non_residents_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <label>
                    <input type="checkbox" value="true" name="featured" {{ old('featured') == true ? 'checked' : ''}}>

                    Featured Safari

                </label>
                
                <h4>Select Category</h4>

                <select name="categoryId" required>
                    @foreach ($categories as $Category)
                        <option value="{{ $Category->id }}" {{ $Category->id == old('categoryId') ? 'selected' : ''}}>
                                {{ ucwords($Category->name) }}
                        </option>
                    @endforeach
                </select>

                @error('categoryId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Select subcategory</h4>

                <select name="subcategoryId" required>
                    @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}" {{ $subCategory->id == old('subcategoryId') ? 'selected' : ''}}>
                                {{ ucwords($subCategory->category->name) }} - {{ ucwords($subCategory->name) }}
                        </option>
                    @endforeach
                </select>

                @error('subcategoryId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Overview</h4>
                
                <textarea name="shortDescription" id="shortDescription">&lt;p&gt;{{ old('shortDescription') }}&lt;/p&gt;</textarea>

                <h4>Cover image</h4>

                <input type="file" name="cover" accept="image/*" required>

                @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Gallery</h4>

                <input type="file" name="gallery[]" accept="image/*" multiple>

                @error('gallery')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Additional Info </h4>
                
                <textarea id="description" name="description">{{ old('description') }}</textarea>

                <h4 style="margin-top: 20px;">SEO</h4>
                

                <textarea placeholder="Description" name="seo_description" rows="5">
                    {{ old('seo_description', $description ?? '') }}
                </textarea>

                @error('seo_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <h4>Included</h4>

                <label>
                    <input type="checkbox" value="true" name="entry_fee" {{ old('entry_fee') == true ? 'checked' : ''}}>

                    Entry Fee
                </label>

                <label>
                    <input type="checkbox" value="true" name="transport" {{ old('transport') == true ? 'checked' : ''}}>

                    Transport
                </label>

                <label>
                    <input type="checkbox" value="true" name="tour_guide" {{ old('tour_guide') == true ? 'checked' : ''}}>

                    Tour Guide
                </label>

                <label>
                    <input type="checkbox" value="true" name="drinks" {{ old('drinks') == true ? 'checked' : ''}}>

                    Drinks
                </label>

                <label>
                    <input type="checkbox" value="true" name="lunch" {{ old('lunch') == true ? 'checked' : ''}}>

                    Lunch
                </label>

                <label>
                    <input type="checkbox" value="true" name="dinner" {{ old('dinner') == true ? 'checked' : ''}}>

                    Dinner
                </label>

                <label>
                    <input type="checkbox" value="true" name="accomodation" {{ old('accomodation') == true ? 'checked' : ''}}>

                    Accomodation
                </label>

                <h4>Location</h4>
                <label>
                    <input type="text" placeholder="Location Name" name="location" {{ old('location') == true ? 'checked' : ''}}>
                </label>

                <!-- @include('dashboard.itinerary') -->

                <button type="submit">Save</button>
            </form>
        </article>
    </section>
@endsection

@section('css')
    
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

    CKEDITOR.replace(tripActivitiesDescription, {
        height: 200
      });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});
</script>