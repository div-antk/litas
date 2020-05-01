<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Listing;
use App\Tag;
use App\Http\Requests\ListingRequest;
use Illuminate\Http\Request;

class ListingsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(User $user)
    {
        $listings = Listing::all()->sortByDesc('created_at');
        return view('listings.index', [
            'listings' => $listings,
            'user' => $user,
            ]);
    }

    public function create()
    {
        // タグ名自動補完のため
        $allTagsNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('listings.new', [
            'allTagNames' => $allTagsNames,
        ]);

        // return view('listings.new');
    }

    public function store(ListingRequest $request, Listing $listing)
    {
        // fillableの利用
        $listing->fill($request->all());
        $listing->user_id = $request->user()->id;
        $listing->save();

        $request->tags->each(function ($tagName) use ($listing) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $listing->tags()->attach($tag);
        });

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }

    public function like(Request $request, Listing $listing)
    {
        $listing->likes()->detach($request->user()->id);
        $listing->likes()->attach($request->user()->id);
        
        return [
            'id' => $listing->id,
            'countLikes' => $listing->count_likes,
        ];
    }

    public function unlike(Request $request, Listing $listing)
    {
        $listing->likes()->detach($request->user()->id);
        
        return [
            'id' => $listing->id,
            'countLikes' => $listing->count_likes,
        ];
    }

    public function edit(Listing $listing)
    {
        $tagNames = $listing->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        // タグ名自動補完のため
        $allTagsNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        // return view('listings.edit', ['listing' => $listing]);
        
        return view('listings.edit', [
            'listing' => $listing,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagsNames,
        ]);
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $listing->fill($request->all())->save();

        $listing->tags()->detach();
        $request->tags->each(function ($tagName) use ($listing) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $listing->tags()->attach($tag);
        });

        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }
    
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->route("users.show", ["name" => Auth::user()->name]);
    }
}
