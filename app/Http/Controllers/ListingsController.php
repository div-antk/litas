<?php

namespace App\Http\Controllers;

use App\Listing;
use Auth;
use Validator;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    // コンストラクタ。このクラスが呼ばれると最初にこの処理をする
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();

            return view('listing/index', ['listings' => $listings]);
    }

    public function new()
    {
        return view('listing/new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,
            // 入力必須、255文字のバリデーション
            ['list_name' => 'required|max:255', ]);

        // バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($valodator->errors())->withInput();
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

        return view('listing/edit', ['listing' => $listing]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,
            ['list_name' => 'required|max:255', ]);

        // バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($valodator->errors())->withInput();
        }

        $listing = Listing::find($request->id);
        $listings->title = $request->list_name;
        $listings->save();

        return redirect('/');
    }
    
    public function destroy($listing_id)
    {
        $listing = Listing::find($listing_id);
        $listing->delete();

        return redirect('/');
    }
}
