<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'adults', 'children', 'infants', 'country', 'additionalNotes', 'citizenship', 'resident', 'non-resident', 'safariId'];

    protected $table = 'bookings';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customerId');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressId');
    }

    public function catalogue()
    {
        return $this->belongsToMany(Safari::class, 'bookingId', 'safariId')->withPivot('quantity');
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = intval($value);
    }

    public function setShippingCostAttribute($value)
    {
        // $this->attributes['shippingCost'] = intval($value);
    }
}
