<?php

namespace App\Http\Controllers;

use App\Listing;
use Auth;
use Validator;

use Illuminate\Http\Request;

class ListingsController extends Controller
{

    public function index()
    {
        // $listings = Listing::where('user_id', Auth::user()->id)
        $listings = Listing::all()->sortByDesc('created_at');

            return view('listings.index', ['listings' => $listings]);
    }

    // public function new()
    // {
    //     return view('listings/new');
    // }

    public function create()
    {
        return view('listings.new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,
            // 入力必須、36文字のバリデーション
            ['list_name' => 'required|max:36', ]);

        // バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Listingモデル作成
        $listings = new Listing;
        $listings->title = $request->list_name;
        $listings->user_id = Auth::user()->id;
        $listings->save();

        return redirect('/');
    }

    public function edit($listing_id)
    {
        $listing = Listing::find($listing_id);

        return view('listings/edit', ['listing' => $listing]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,
            ['list_name' => 'required|max:36', ]);

        // バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $listing = Listing::find($request->id);
        $listing->title = $request->list_name;
        $listing->save();

        return redirect('/');
    }
    
    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $listing->delete();

        return redirect('/')->with('flash_message', 'リストを削除しました！');
        ;
    }
}
