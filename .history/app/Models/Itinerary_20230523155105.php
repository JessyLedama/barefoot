<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = ['itinerary_day', 'itinerary_image', 'itinerary_description', 'trip_activities_description'];

}
