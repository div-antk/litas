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
    public function index(User $user, Request $request)
    {
        // ランダムに表示
        $listings = Listing::inRandomOrder()->take(12)
            ->with('user')
            ->with('likes')
            ->with('tags')
            ->get();

        return view('listings.index')
            ->with('listings', $listings)
            ->with('user', $user);
    }

    public function create()
    {
        // タグ名自動補完のため
        $allTagsNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('listings.new')
            ->with('allTagNames', $allTagsNames);
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

        return view('listings.edit')
            ->with('listing', $listing)
            ->with('tagNames', $tagNames)
            ->with('allTagNames', $allTagsNames);
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

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        // $a = Listing::has('user')->where('name', 'iLIKE', "%$keyword%")->get();
        // $result = Listing::whereHas('user', function($q) use($keyword){
        //     $q->where('name', 'iLIKE', "%$keyword%");
        // })->get();



        // リスト名とタグからあいまい検索（大文字小文字無視）
        $result = Listing::whereHas('tags', function($q) use($keyword){
            $q->where('name', 'iLIKE', "%$keyword%");
        })->whereHas('user', function($q) use($keyword){
            $q->where('name', 'iLIKE', "%$keyword%");
        })->orWhere(function($q) use($keyword){
            $q->where('title', 'iLIKE', "%$keyword%");
        })->get();


        // $result = Listing::where('title', 'iLIKE', "%$keyword%")
        //     ->Tag::orWhere('name', 'iLIKE', "%$keyword%")->get();

        //     dd($result);

        if ($result) {
            return view('listings.search_result')
                ->with('result', $result)
                ->with('keyword', $keyword);
        } else {
            return redirect()->route("listings.index");
        }
    }
}
