<?php

namespace App\Mo;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['phone', 'county', 'town', 'street', 'customerId'];

    // protected $table = 'addresses';
}
