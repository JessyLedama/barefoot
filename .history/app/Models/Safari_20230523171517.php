<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Storage;
use Illuminate\Support\Str;

class Safari extends Model
{
    protected $fillable = ['name', 'slug', 'price_from','residents_price', 'non_residents_price', 'entry_fee','transport','tour_guide', 'drinks', 'lunch', 'dinner', 'accomodation','shortDescription', 'description', 'location', 'map', 'link', 'featured', 'cover', 'gallery', 'subcategoryId', 'itineraryId',];

    protected $primaryKey = 'id';

    protected $appends = ['coverUrl', 'url', 'images'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategoryId');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function itinerary()
    {
        return $this->hasMany(Itinerary::class, 'safariId');
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'product_likes', 'productId', 'customerId');
    // }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'safariId');
    }

    // public function getTotalLikesAttribute()
    // {
    //     return count($this->likes);
    // }

    // public function getCustomerFavouriteAttribute()
    // {
    //     return Auth::check() ? $this->likes->contains(Auth::user()) : false;
    // }

    public function getCoverUrlAttribute()
    {
        return $this->cover ? Storage::url($this->cover) : Storage::url('products/cover.jpg');
    }

    public function getUrlAttribute()
    {
        return route('product.page', $this->slug ?? Str::slug($this->name));
    }

    public function getImagesAttribute()
    {
        $gallery = $this->gallery ? explode('|', $this->gallery) : [];

        return $gallery ?  array_map(function ($path, $key) { 

            return [

                'id' => $key,
                'url' => Storage::url(str_replace('public/uploads/', '', $path))
            ]; 

        }, $gallery, array_keys($gallery)) : [];
    }

    public function locations()
    {
        return $this->belongsTo(TouristLocation::class, 'touristLocationId');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
