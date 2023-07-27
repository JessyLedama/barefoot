<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Safari;

class CategoryController extends Controller
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
        $category = Category::whereSlug($slug)->with('subcategories')->first();
        

         $safaris = Safari::whereSlug($slug)->order_by('price_from', 'asc')->take(12)->get();

        // $safaris = $this->filterByMaxPrice(
            
        //     $this->filterByMinPrice(
                
        //         $safaris, $request->query('minPrice')
        //     ),

        //     $request->query('maxPrice')

        // );
        
        // $items = $this->filterByMaxRange(
            
        //     $this->filterByMinRange(
                
        //         $safaris, $request->query('minRange')
        //     ),

        //     $request->query('maxRange')

        // );

        // if (!$request->ajax()) $count = $safaris->count();
        
        // $safaris = $safaris->paginate(20)->appends([
        //     'minPrice' => $request->query('minPrice'),
        //     'maxPrice' => $request->query('maxPrice'),
        //     'maxRange' => $request->query('maxRange'),
        //     'minRange' => $request->query('minRange'),
        //     'order' => $request->query('order')
        // ]);
        
        $count = $safaris->count();

        // if ($request->ajax()) return $safaris->items();

        return view('customer.category', compact('category','count','safaris'));
    }

    /**
     * Filter safaris by subcategory.
     * 
     * @param  array  $safaris
     * @param  string  $subCategory
     */
    // public function filterBySubCategory($safaris, $subCategory)
    // {
    //     return $safaris->whereHas('subCategory', function ($query) use ($subCategory) {

    //         $query->where('slug', 'like', "%$subCategory%");

    //     });
    // }
    

    
    /**
     * Filter safaris with minimum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasManyThrough  $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function filterByMinRange($safaris, $price)
    // {
    //     return $safaris->where('price_from', '<=', intval($price));
    // }
    
    /**
     * Filter safaris with maximum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasManyThrough  $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function filterByMaxRange($safaris, $price)
    // {
    //     return $safaris->where('price_to', '>=', intval($price));
    // }
    

    /**
     * Filter safaris with minimum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasManyThrough  $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function filterByMaxPrice($safaris, $price)
    // {
    //     return $safaris->where('price', '>=', intval($price));
    // }

    /**
     * Filter safaris with maximum price.
     * 
     * @param  \Illuminate\Database\Eloquent\Relations\HasManyThrough  $safaris
     * @param  string  $price
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function filterByMinPrice($safaris, $price)
    // {
    //     return $price ? $safaris->where('price', '<=', intval($price)) : $safaris;
    // }

    // /**
    //  * Order safaris.
    //  * 
    //  * @param  \Illuminate\Database\Eloquent\Relations\HasManyThrough  $safaris
    //  * @param  string $order
    //  * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
    //  */
    public function orderSafaris($safaris, $booking)
    {
        // switch ($booking) {
                
        //     case 'lowestPrice':

        //         $safaris = $safaris->orderBy('price');
        //         break;

        //     case 'highestPrice':
            
        //         $safaris = $safaris->orderBy('price', 'desc');
        //         break;
            
        //     case 'minRange':

        //         $safaris = $safaris->orderBy('price_from');
        //         break;

        //     case 'maxRange':
            
        //         $safaris = $safaris->orderBy('price_to', 'desc');
        //         break;

        //     default:
            
        //         $safaris = $safaris->latest();
        //         break;
        // }

        // return $safaris;
    }
}
