<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $order = new Order();
        $order->save();
        foreach($request->all() as $item){
            DB::table('order_items')
                ->where('id', $item['id'])
                ->update(['order_id' =>$order->id]);
        }

        $om = new OrderItemController();
        return response()->json($om->getAllItems());
    }
}
