<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Storage;
use Illuminate\Support\Str;

class TouristLocation extends Model
{
    protected $fillable = ['name', 'description', 'cover',];

    protected $table = 'tourist_locations'; 

}
