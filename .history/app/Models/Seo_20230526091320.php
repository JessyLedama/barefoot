<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = ['keywords', 'description', 'title', 'safariId', 'seoable_id', 'seoable_type'];
}
