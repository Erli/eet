<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index()
    {
        return view('items');
    }

    public function get(Request $request)
    {
        $posts = Item::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function getById(int $id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $post = Item::create($request->all());

        return response()->json($post);
    }

    public function delete($id)
    {
        Item::destroy($id);

        return response()->json("ok");
    }

    public function update(Request $request)
    {
        $item = Item::findOrFail($request->id);
        $item->title = $request->title;
        $item->price = $request->price;
        $item->save();
        $items = Item::orderBy('created_at', 'desc')->get();
        return response()->json($items);
    }
}
