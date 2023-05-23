<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Safari;

class CartController extends Controller
{
    /**
     * Load safaris in shopping cart.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Safaris[]
     */
    public function safaris(Request $request)
    {
        // $safaris = Safari::whereIn('id', explode(',', $request->query('safaris')))->get();

        // return (string) $safaris;
    }
}
