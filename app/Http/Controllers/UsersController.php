<?php

namespace App\Http\Controllers;
use App\User;
use App\Card;
// use App\Listing;
// use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(string $name, Card $card)
    {
        $user = User::where('name', $name)->first()
            ->load(['listings.user', 'listings.likes', 'listings.tags']);

        // リストを更新順に並べる
        $listings = $user->listings
            ->sortByDesc('updated_at');

        return view('users.show')
            ->with('user', $user)
            ->with('listings', $listings)
            ->with('card', $card);
    }
}
