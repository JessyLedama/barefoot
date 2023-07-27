<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Safari;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Itinerary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSafariRequest;
use App\Http\Requests\UpdateSafariRequest;
use Storage;
use App\Models\Review;
use App\Models\Seo;
    
class SafariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $safaris = Safari::latest()->paginate(10);

        return view('dashboard.safari.index', compact('safaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::has('category')->with('category')->get();
        $categories = Category::get();

        return view('dashboard.safari.create', compact('subCategories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSafariRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get cover image
        $cover = $request->file('cover')->store('safaris', ['disk' => 'public']);

        // get gallery data
        $gallery = [] + array_map(function ($image) {

            return $image->store('safaris', ['disk' => 'public']);

        }, $request->file('gallery') ?? []);

        // get slug
        $slug = strtolower(str_replace(' ', '-', $request->name));

        // Store safari data.
        $safari = Safari::create($request->except(['cover', 'gallery', 'featured', 'slug']) + [

            'cover' => $cover,
            'gallery' => implode('|', $gallery),
            'featured' => $request->featured ? 1 : 0,
            'slug' => $slug,
        ]);

        // store seo data
        $seo = Seo::create([

            'title' => $request->seo_title,
            'keywords' => $request->seo_keywords,
            'description' => $request->seo_description,
            'safariId' => $safari->id,
            'seoable_id' => $safari->id,
            'seoable_type' => $safari->id,
        ]);

        // get itinerary data
        $itineraryImage = [] + array_map(function ($i) {

            return $i->store('itinerary', ['disk' => 'public']);

        }, $request->file('itinerary_image') ?? []);
        $iDay = [];
        array_push($request->itinerary_day, $iDay);

        $iDescription = [];
        array_push($request->itinerary_day, $iDescription);

        $tActivities = [];
        array_push($request->trip_activities_description, $tA);

        // store itinerary data
        $itinerary = Itinerary::create([
            'itinerary_image' => implode('|', $itineraryImage),
            'itinerary_day' => implode('|', $iDay),
            'itinerary_description' => implode('|', $iDescription), 
            'trip_activities_description' => implode('|', $tActivities), 
        ]);

        session()->flash('success', 'Safari has been saved.');

        return redirect()->route('admin.safaris.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    public function edit(Safari $safari)
    {
        $subCategories = SubCategory::has('category')->with('category')->get();
        $categories = Category::get();
        $itineraryDays = Itinerary::select('itinerary_day')->where('safariId', $safari['id'])->get();
        $itineraryImage = Itinerary::where('safariId', $safari['id'])->get(['itinerary_image']);
        $itineraryDescriptions = Itinerary::where('safariId', $safari['id'])->get(['itinerary_description']);
        $tripDescriptions = Itinerary::where('safariId', $safari['id'])->get(['trip_activities_description']);

        $itineraryDay = explode('|', $itineraryDays);
        $itineraryDescription = explode('|', $itineraryDescriptions);
        $tripDescription = explode('|', $tripDescriptions);

        return view('dashboard.safari.edit', compact('subCategories', 'safari', 'categories', 'itineraryDay','itineraryImage','itineraryDescription', 'tripDescription'));
    }


    /**
     * Show the form for editing the safari price.
     *
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    public function edit_price(Safari $safari)
    {
        return view('dashboard.safari.edit-price', compact('safari'));
    }

    /**
     * Update safari price.
     *
     * @param  \App\Http\Requests\UpdateSafariRequest  $request
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Safari $safari)
    {
        
        $safari->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price_from' => $request->price_from,
            'residents_price' => $request->residents_price,
            'non_residents_price' => $request->non_residents_price,
            'shortDescription' => $request->shortDescription,
            'description' => $request->description,
        ]);

        session()->flash('success', 'The safari has been updated.');

        return view('dashboard.safari.edit-price', compact('safari'));
        // return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSafariRequest  $request
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateSafariRequest $request, Safari $safari)
    // {
    //     if ($request->hasFile('cover')) {

    //         Storage::delete(str_replace('public/uploads/', '', $safari->cover));

    //         $cover = $request->file('cover')->store('safaris');
    //     }

    //     $gallery = explode('|', trim($safari->gallery)) + array_map(function ($image) {

    //         return $image->store('safaris');

    //     }, $request->file('gallery') ?? []);

    //     $safari->update($request->except(['cover', 'gallery', 'featured']) + [

    //         'cover' => $cover ?? $safari->cover,
    //         'gallery' => implode('|', $gallery),
    //         'featured' => $request->featured ? 1 : 0
    //     ]);

    //     $safari->seo()->updateOrCreate([

    //         'seoable_id' => $safari->id,
    //         'seoable_type' => get_class($safari)
    //     ], [

    //         'title' => $request->seo_title ?? $safari->name,
    //         'keywords' => $request->seo_keywords ?? $safari->name,
    //         'description' => $request->seo_description ?? $safari->name
    //     ]);


    //     $safari->itinerary()->updateOrCreate([

    //         'itinerary_day' => $request->itinerary_day ?? $safari->name,
    //         'itinerary_image' => $request->itinerary_image ?? $safari->name,
    //         'itinerary_description' => $request->itinerary_description ?? $safari->name,
    //         'trip_activities_description' => $request->trip_activities_description ?? $safari->name
    //     ]);

    //     session()->flash('success', 'Safari has been updated.');

    //     return back();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Safari $safari)
    {
        $safari->delete();

        session()->flash('success', 'Safari has been deleted.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Safari  $safari
     * @return \Illuminate\Http\Response
     */
    public function destroyInGallery(Request $request, Safari $safari)
    {
        $index = $request->index;
        
        $gallery = explode('|', $safari->gallery);
        
        if (Storage::delete(str_replace('public/uploads/', '', $gallery[$index]))) {

            unset($gallery[$index]);

            $safari->update([

                'gallery' => implode('|', $gallery)
            ]);
        }
        else return response('Failed to delete remove from gallery', 500);
    }

}
