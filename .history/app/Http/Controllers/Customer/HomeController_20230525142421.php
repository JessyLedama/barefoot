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
 
        $featuredSafaris = Safari::whereFeatured(true)->inRandomOrder()->take(3)->get();

        // $safaris = Safari::with('subCategory')->all();

        $kenyaSafaris = Safari::where('subcategoryId', 1)->take(3)->get();

        $kenyaLocalSafaris = Safari::where(['subcategoryId' => 1, 'subcategoryId' => 1])->take(6)->get();

        $kenyaMultipleDaySafaris = Safari::where(['subcategoryId' => 1, 'subcategoryId' => 2])->take(3)->get();

        $ugandaSafaris = Safari::where('subcategoryId', 2)->take(3)->get();

        $tanzaniaSafaris = Safari::where('subcategoryId', 3)->take(3)->get();

        $locations = TouristLocation::take(3)->get();

        $gallery = Safari::take(6)->get();

        return view('customer.land', compact('categories', 'featuredSafaris', 'kenyaSafaris','ugandaSafaris', 'tanzaniaSafaris', 'kenyaLocalSafaris', 'kenyaMultipleDaySafaris', 'locations','gallery'));
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
        $kenyaSafaris = Safari::with('subCategory')->get();
        $kenyaSafarisCount = Safari::where('categoryId', 1)->count();
        
        return view('customer/allsafaris/kenya', compact('kenyaSafaris', 'kenyaSafarisCount'));
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
        $ugandaSafaris = Safari::where('categoryId', 2)->get();
        $ugandaSafarisCount = Safari::where('categoryId', 2)->count();

        return view('customer/allsafaris/uganda', compact('ugandaSafaris', 'ugandaSafarisCount'));
    }

    public function tanzaniaSafaris()
    {
        $tanzaniaSafaris = Safari::where('categoryId', 3)->get();
        $tanzaniaSafarisCount = Safari::where('categoryId', 3)->count();

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
        ];

        // Mail::send('customer.booking-mail', $emailData, function($message){
        //     $message->to('sirjayliste@gmail.com', 'Bookings: Barefoot Adventures')->subject
        //         ('Testing');
        //     $message->from('xyz@gmail.com','Barefoot Adventures');
        // });

        session()->flash('success', 'Your booking has been made.');

        return view('customer.booked');
    }

    public function getSlugAttribute(): string
    {
        return action('HomeController@show', [$this->id, $this->slug]);
    }
}
