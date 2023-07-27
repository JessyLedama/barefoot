<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TouristLocation;

class TouristLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $touristLocations = TouristLocation::latest()->paginate();
        $locationCount = count($touristLocations);

        return view('customer.tourist-locations', compact('touristLocations', 'locationCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/locations/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = $request->file('cover')->store('locations', ['disk' => 'public']);

        $location = TouristLocation::create($request->except(['cover']) + [
            'cover' => $cover,
        ]);

        session()->flash('success', 'Location has been saved.');

        return view('dashboard.locations.edit', compact('location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = TouristLocation::where('id', $id)->get();
        
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('cover')) {

            Storage::delete(str_replace('public/uploads/', '', $request->cover));

            $cover = $request->file('cover')->store('locations');
        }

        $location->update($request->except(['cover']) + [

            'cover' => $cover ?? $location->cover,
        ]);

        session()->flash('success', 'Location has been updated.');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location->delete();

        session()->flash('success', 'Location has been deleted.');

        return back();
    }
}
