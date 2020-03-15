<?php

namespace App\Http\Controllers;

use App\Item;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{

    public function get(Request $request)
    {

        return response()->json($this->getAllItems());
    }

    public function store(Request $request)
    {

       $oitem = DB::table('order_items')
            ->where('order_id',0)->where('items_id', $request->id)->first();
       if(!$oitem){
            $item = new OrderItem;
            $item->quantity = 1;
            $item->items_id= $request->id;
            $item->price= $request->price;

            $item->save();
       }else{
           DB::table('order_items')
               ->where('id', $oitem->id)
               ->update(['quantity' =>$oitem->quantity+1]);
       }
        return response()->json($this->getAllItems());
    }

    public function getAllItems(){
        return OrderItem::orderBy('order_items.created_at', 'desc')
            ->select('order_items.*', 'items.title')
            ->join('items', 'items.id', '=', 'order_items.items_id')
            ->where('order_id',0)
            ->get();
    }



    public function delete($id)
    {
        OrderItem::destroy($id);

        return response()->json("ok");
    }
}
