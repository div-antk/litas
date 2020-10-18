<?php

namespace App\Http\Controllers;

use App\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first();

        return view('tags.show', ['tag' => $tag]);
    }

    public function search(Request $request)
    {
        $tag = Tag::where('name', $request->tag)->first();

        if ($tag) {
            return view('tags.show')
                ->with('tag' ,$tag);
        } else {
            return redirect()->route("listings.index");
        }
    }
}
