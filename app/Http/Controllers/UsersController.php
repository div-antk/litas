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

        $listings = $user->listings->sortBy('updated_at');

        return view('users.show', [
            'user' => $user,
            'listings' => $listings,
            'card' => $card,
        ]);
    }
}
