<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Safari;
use App\Models\Itinerary;
use App\Models\Review;
use App\Models\TouristLocation; 
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Mail;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all()->each(function ($category) {

            $category->load(['safaris' => function ($query) {

                $query->inRandomOrder()->limit(5);
    
            }]);
            
        });
 
        // featured safaris
        $featuredSafaris = Safari::whereFeatured(true)->inRandomOrder()->take(3)->get();

        // country categories
        $ugandaCategory = Category::where('slug', 'uganda-safaris')->first();

        $tanzaniaCategory = Category::where('slug', 'tanzania-safaris')->first();

        // subcategories
        $localSubcategory = SubCategory::where('id', '1')->first();

        $multiSubcategory = SubCategory::where('id', '2')->first();

        // safaris
        $kenyaLocalSafaris = Safari::where('subcategoryId', '1')->take(3)->get();

        $kenyaMultipleDaySafaris = Safari::where('subcategoryId', '2')->take(3)->get();

        

        $ugandaSafaris = Safari::where('categoryId', '2')->take(3)->get();

        $tanzaniaSafaris = Safari::where('categoryId', '3')->take(3)->get();

        // locations
        $locations = TouristLocation::take(3)->get();

        // gallery
        $gallery = Safari::take(6)->get();

        return view('customer.land', compact('categories', 'featuredSafaris', 'kenyaLocalSafaris', 'ugandaSafaris', 'tanzaniaSafaris', 'kenyaMultipleDaySafaris', 'locations','gallery'));

    
    }
    /**
     * View safari.
     * 
     * @param  string  $slug
     */
    public function show($slug)
    {
        // $safari = Safari::whereSlug($slug)->with(['reviews', 'subCategory.category.safaris' => function ($query) use ($slug) {

        //     $query->where('safaris.slug', '!=', $slug)->take(5);

        // }, 'seo'])->first();

        $safari = Safari::where('id', $slug)->with(['reviews', 'subCategory.category.safaris'])->first();

        $gallery = Safari::select('gallery')->where('id', $slug)->take(4)->get();

        $includes = Safari::where([])->get();

        $itinerary = Itinerary::where('safariId', $slug)->first();

        $reviews = Review::where('safariId', $slug)->first();
        // $slug->with(['reviews', 'subCategory.category.safaris']);

        return view('customer/safari', compact('safari', 'includes', 'gallery', 'itinerary', 'reviews'));
    }

    public function kenyaSafaris()
    {   
        $kenyaSafaris = [];
        $safaris = Safari::with('subCategory')->with('category')->get();
        $kenyaCategory = Category::where('slug', 'kenya-safaris')->first();
        $kenyaSubcategories = SubCategory::where('categoryId', $kenyaCategory->id)->get();
        
        foreach($safaris as $safari){
            if($safari->categoryId == $kenyaCategory->id){
                array_push($kenyaSafaris, $safari);
            }
        }

        $kenyaSafarisCount = count($kenyaSafaris);
        
        return view('customer/allsafaris/kenya', compact('kenyaSafaris', 'kenyaSafarisCount', 'kenyaSubcategories'));
    }

    public function kenyaLocalSafaris()
    {
        $kenyaLocalSafarisCount = Safari::where(['categoryId' => 1, 'subcategoryId' => 1])->count();
        $kenyaLocalSafaris = Safari::where(['categoryId' => 1, 'subcategoryId' => 1])->get();

        return view('customer/allsafaris/kenya-local', compact('kenyaLocalSafaris', 'kenyaLocalSafarisCount'));
    }

    public function kenyaMultipleDaySafaris()
    {
        $kenyaMultipleDaySafarisCount = Safari::where(['categoryId' => 1, 'subcategoryId' => 2])->count();
        $kenyaMultipleDaySafaris = Safari::where(['categoryId' => 1, 'subcategoryId' => 2])->get();

        return view('customer/allsafaris/kenya-multiple', compact('kenyaMultipleDaySafaris', 'kenyaMultipleDaySafarisCount'));
    }

    public function ugandaSafaris()
    {
        $ugandaSafaris = [];
        $safaris = Safari::all();
        $ugandaCategory = Category::where('slug', 'uganda-safaris')->first();
        
        if(!empty($safaris)){

            foreach($safaris as $safari){
                if($safari->categoryId == $ugandaCategory->id){
                    array_push($ugandaSafaris, $safari);
                }
            }
        }

        $ugandaSafarisCount = count($ugandaSafaris);

        return view('customer/allsafaris/uganda', compact('ugandaSafaris', 'ugandaSafarisCount'));
    }

    public function tanzaniaSafaris()
    {
        $tanzaniaSafaris = [];
        $safaris = Safari::all();
        $tanzaniaCategory = Category::where('slug', 'tanzania-safaris')->first();
        
        if(!empty($safaris)){

            foreach($safaris as $safari){
                if($safari->categoryId == $tanzaniaCategory->id){
                    array_push($tanzaniaSafaris, $safari);
                }
            }
        }

        $tanzaniaSafarisCount = count($tanzaniaSafaris);

        return view('customer/allsafaris/tanzania', compact('tanzaniaSafaris', 'tanzaniaSafarisCount'));
    }

    public function gallery()
    {
        $galleryPhotos = Safari::get();
        $galleryCount = count($galleryPhotos);

        return view('customer/gallery', compact('galleryPhotos', 'galleryCount')); 
    }

    public function booking($slug)
    {
        $safari = Safari::where('id', $slug)->with(['reviews', 'subCategory.category.safaris'])->first();

        $countries = TouristLocation::get();

        return view('customer/booking', compact('safari', 'countries'));
    }

    public function storeBooking(Request $request)
    {
        $booking = Booking::create($request->all());

        $safariSlug = strtolower(str_replace(' ', '-', $request->safariId));

        $safari = Safari::where('slug', $safariSlug)->first();

        $emailData = [
            'name' => $request->firstName,
            'email' => $request->email,
            'phone' => $request->phone,
            'adults' => $request->adults,
            'children' => $request->children,
            'infants' => $request->infants,
            'country' => $request->country,
            'additionalNotes' => $request->additionalNotes,
            'safariId' => $request->safariId,
            'citizen' => $request->citizen,
            'resident' => $request->resident,
            'nonResident' => $request->non_resident,
            'price' => $safari->price_from,
        ];

        Mail::send('customer.booking-mail', $emailData, function($message){
            $message->to('info@barefootadventures.africa', 'Bookings: Barefoot Adventures')->subject
                ('Booking Received');
            $message->from('info@barefootadventures.africa','Barefoot Adventures');
        });

        session()->flash('success', 'Your booking has been made.');

        return view('customer.booked');
    }

    public function getSlugAttribute(): string
    {
        return action('HomeController@show', [$this->id, $this->slug]);
    }
}
