<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['safariId', 'rating', 'title', 'name', 'comment', 'recommend'];

    protected $appends = ['posted'];

    public function getPostedAttribute()
    {
        return $this->created_at->format('F j, Y');
    }
}
