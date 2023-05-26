<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    private $safaris;

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $subCategory = SubCategory::whereSlug($slug)->first();

        $safaris = Safari::where

        // $safaris = $this->orderSafaris($subCategory->safaris(), $request->query('order'));

        // $safaris = $this->filterByMaxPrice(
            
        //     $this->filterByMinPrice(
                
        //         $safaris, $request->query('minPrice')
        //     ),

        //     $request->query('maxPrice')

        // );

        // if (!$request->ajax()) $count = $safaris->count();
        
        $safaris = $safaris->paginate(20)->appends([

            'Price' => $request->query('Price'),
            'minPrice' => $request->query('minPrice'),
            'maxPrice' => $request->query('maxPrice'),
            'order' => $request->query('order')
        ]);

        // if ($request->ajax()) return $safaris->items();

        $subCategory->load(['category.subCategories' => function ($query) use($subCategory) {

            $query->where('subcategories.slug', '!=', $subCategory->slug);
        }]);
        
        $count = $safaris->count();

        return view('customer.subcategory', compact('subCategory', 'safaris', 'count'));
    }

    /**
     * Filter safaris with price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasMany $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filterByPrice($safaris, $price)
    {
        return $safaris->where('price', '>=', intval($price));
    }
    
    /**
     * Filter safaris with minimum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasMany $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filterByMinPrice($safaris, $price)
    {
        return $safaris->where('price_from', '>=', intval($price));
    }

    /**
     * Filter safaris with maximum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasMany  $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filterByMaxPrice($safaris, $price)
    {
        return $price ? $safaris->where('price_to', '<=', intval($price)) : $safaris;
    }

    /**
     * Order safaris.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasMany  $safaris
     * @param  string $order
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderSafaris($safaris, $order)
    {
        switch ($order) {
            case 'Price':

                $safaris = $safaris->orderBy('price');
                break;
                
            case 'lowestPrice':

                $safaris = $safaris->orderBy('price_from');
                break;

            case 'highestPrice':
            
                $safaris = $safaris->orderBy('price_to', 'desc');
                break;

            default:
            
                $safaris = $safaris->latest();
                break;
        }

        return $safaris;
    }
}
