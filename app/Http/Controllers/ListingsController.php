<?php

namespace App\Http\Controllers;

use App\Listing;
use Auth;
use Validator;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    // public function __construct()
    // {
    //     this->middleware('auth');
    // }

    public function index()
    {
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

            return view('listing/index', ['listings' => $listings]);
    }
}
