<?php

namespace App\Http\Controllers;
use App\User;
use App\Card;
// use App\Listing;
// use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // public function index(string $name)
    // {
    //     $user = User::where('name', $name)->first();

    //     $listings = $user->listings->sortByDesc('created_at');

    //     return view('users.index', [
    //         'user' => $user,
    //         'listings' => $listings,
    //     ]);
    // }

    public function show(string $name, Card $card)
    {
        $user = User::where('name', $name)->first();

        $listings = $user->listings->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'listings' => $listings,
            'card' => $card,
        ]);
    }
}
