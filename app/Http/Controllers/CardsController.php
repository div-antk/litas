<?php

namespace App\Http\Controllers;
use Auth;
// use Validator;
use App\User;
use App\Card;
use App\Http\Requests\CardRequest;
use App\Listing;
use App\Http\Requests\ListingRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function new ($listing_id)
    {
        return view('card/new', ['listing_id' => $listing_id]);
    }

    public function store(CardRequest $request)
    {
        Card::create([
            'listing_id' => $request->listing_id,
            'title' => $request->title,
            'memo' => $request->memo,
            ]);
        

        return redirect()->route("users.show", ['name' => Auth::user()->name]);
    }
    
    public function edit($card_id)
    {
        $card = Card::find($card_id);

        return view('card/edit')
            ->with('card', $card);
    }

    public function update(CardRequest $request, Card $card)
    {
        // カード情報が更新されたらtrue
        $done = boolval(Card::where('id', $card->id)
            ->update([
                'title' => $request->title,
                'memo' => $request->memo
                ]));

        // カード情報が更新されたらリストのupdate_atを更新
        if($done) {
            Listing::where('id', $request->listing_id)
                ->update(['updated_at' => Carbon::now()]);
        }

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }

    public function destroy(listing $listing, Card $card)
    {
        $card->delete();

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }
}
