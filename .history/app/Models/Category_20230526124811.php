<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'cover', 'description'];

    protected $appends = ['url'];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'subCategoryId');
    }

    public function safaris()
    {
        return $this->hasManyThrough(Safari::class, SubCategory::class, 'categoryId', 'subCategoryId');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function getUrlAttribute()
    {
        return route('category.page', $this->slug);
    }
}
