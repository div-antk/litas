<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Http\Requests\ListingRequest;
// use Auth;
// use Validator;
use Illuminate\Http\Request;

class ListingsController extends Controller
{

    public function index()
    {
        // $listings = Listing::where('user_id', Auth::user()->id)
        $listings = Listing::all()->sortByDesc('created_at');

            return view('listings.index', ['listings' => $listings]);
    }

    // public function new()
    // {
    //     return view('listings/new');
    // }

    public function create()
    {
        return view('listings.new');
    }

    public function store(ListingRequest $request, Listing $listing)
    {
        // fillableの利用
        $listing->fill($request->all());
        $listing->user_id = $request->user()->id;
        $listing->save();
        return redirect()->route('listings.index');
    }

    public function edit(Listing $listing)
    {
        // $listing = Listing::find($listing_id);

        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->fill($request->all())->save();
        return redirect()->route('listings.index');
    }
    
    public function destroy(Listing $listing)
    {
        // $listing = Listing::find($listing_id);
        $listing->delete();
        return redirect()->route('listings.index');
    }
}
