<?php

namespace App\Http\Controllers;
use Auth;
// use Validator;
use App\User;
use App\Card;
use App\Http\Requests\CardRequest;
use App\Listing;
use App\Http\Requests\ListingRequest;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function new ($listing_id)
    {
        return view('card/new', ['listing_id' => $listing_id]);
    }

    public function store(CardRequest $request, Card $card, listing $listing)
    {
        $card->fill($request->all());
        $card->listing_id = $request->listing_id;
        $card->save();

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }
    
    public function edit($listing_id, $card_id)
    {
        $listings = Listing::where('user_id', Auth::user()->id)->get();
        $listing = Listing::find($listing_id);
        $card = Card::find($card_id);

        return view('card/edit', ['listings' => $listings, 'listing' => $listing, 'card' => $card]);
    }

    public function update(CardRequest $request, Card $card, listing $listing)
    {
        // $card = Card::find($request->id);
        $card->fill($request->all());
        $card->listing_id = $request->listing_id;
        $card->save();

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }

    public function destroy(listing $listing, Card $card)
    {
        $card->delete();

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }
}
