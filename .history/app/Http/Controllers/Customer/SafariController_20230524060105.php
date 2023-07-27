<?php

namespace App\Http\Controllers\Das;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Safari;
use Auth;
use App\Review;

class SafariController extends Controller
{ 
    /**
     * SafariController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'review']);
    }

    /**
     * Save safari to customer likes.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function like(Request $request)
    {
        Auth::user()->likes()->attach($request->get('id'));
    }

    /**
     * Remove safari from customer likes.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function unlike(Request $request)
    {
        Auth::user()->likes()->detach($request->get('id'));
    }

    /**
     * Save safari review.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function review(Request $request)
    {
        $review = Review::create($request->all());

        return (string) $review;
    }

    /**
     * View safari.
     * 
     * @param  string  $slug
     */
    public function show($slug)
    {
        $safari = Safari::with(['reviews', 'subCategory.category.safaris' => function ($query) use ($slug) {

            $query->where('safaris.slug', '!=', $slug)->take(5);

        }, 'seo'])->first();

        return view('customer.safari', compact('safari', 'gallery'));
    }
}
 