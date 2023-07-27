<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Safari;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::paginate(5);
        $safaris = Safari::with('subCategory')->paginate(10);
        $subCategories = SubCategory::paginate(5);

        return view('dashboard', compact('categories', 'safaris', 'subCategories'));
    }
}
