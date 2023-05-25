<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TouristLocation;
use Auth;
use App\Models\Review;

class TouristLocationsController extends Controller
{
    /**
     * TouristLocationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'review']);
    }

    /**
     * Save location to customer likes.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function like(Request $request)
    {
        Auth::user()->likes()->attach($request->get('id'));
    }

    /**
     * Remove location from customer likes.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function unlike(Request $request)
    {
        Auth::user()->likes()->detach($request->get('id'));
    }

    /**
     * Save location review.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function review(Request $request)
    {
        $review = Review::create($request->all());

        return (string) $review;
    }

    /**
     * View location.
     * 
     * @param  string  $slug 
     */ 
    public function show($slug)
    {
        $location = TouristLocation::where('id', $slug)->first();

        return view('customer.location', compact('location'));
    }

    public function index(){
        
    }
}
