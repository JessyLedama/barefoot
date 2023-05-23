<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::paginate(5);
        
        return view('dashboard', );
    }
}
