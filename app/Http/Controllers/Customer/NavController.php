<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Safari;

class NavController extends Controller
{
    public function index()
    {
        $categories = Category::all()->each(function ($category) {

            $category->load(['safaris' => function ($query) {

                $query->inRandomOrder()->limit(5);
    
            }]);
            
        });

        return view('layouts.app', compact('categories'));
    }
}