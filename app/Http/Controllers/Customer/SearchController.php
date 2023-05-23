<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Safari;
use App\Category;

class SearchController extends Controller
{
    /**
     * Filter and display the specified resource.
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->query('search', '');

        $safaris = Safari::where('name', 'like', "%$term%");

        if (!$request->ajax()) $count = $safaris->count();

        $safaris = $safaris->paginate(20)->appends([

            'search' => $term

        ]);

        if ($request->ajax()) return $safaris->items();

        return view('customer.search', compact('safaris', 'count'));
    }
}
