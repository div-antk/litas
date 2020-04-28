<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;

class ListingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listings = Listing::all()->sortByDesc('created_at');
        return view('listings.index', ['listings' => $listings]);
    }

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
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->fill($request->all())->save();
        return redirect()->route('listings.index');
    }
    
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route('listings.index');
    }
}
