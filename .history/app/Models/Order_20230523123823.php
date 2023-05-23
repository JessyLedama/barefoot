<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['ordNo', 'customerId', 'addressId', 'shippingCost', 'transactionNo', 'status', 'total'];

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
        return $this->belongsToMany(Safari::class, 'order_safaris', 'orderId', 'safariId')->withPivot('quantity');
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = intval($value);
    }

    public function setShippingCostAttribute($value)
    {
        $this->attributes['shippingCost'] = intval($value);
    }
}
