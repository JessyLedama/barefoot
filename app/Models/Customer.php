<?php

namespace App\Models;

trait Customer
{
    public function wishlist()
    {
        return $this->belongsToMany(Safari::class, 'wishlist_safaris', 'customerId', 'safariId');
    }

    public function likes()
    {
        return $this->belongsToMany(Safari::class, 'safari_likes', 'customerId', 'safariId');
    }

    public function addressBook()
    {
        return $this->hasMany(Address::class, 'customerId');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerId');
    }
}