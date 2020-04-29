<?php

namespace App\Http\Controllers;
use Auth;
// use Validator;
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
        // $cards = new Card;
        $card->fill($request->all());
        // $card->title = $request->card_title;
        $card->listing_id = $request->listing_id;
        // $card->memo = $request->card_memo;
        $card->save();

        return redirect()->route('listings.index');
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

        return redirect()->route('listings.index');
    }

    public function destroy(listing $listing, Card $card)
    {
        $card->delete();

        return redirect()->route('listings.index');
    }
}
