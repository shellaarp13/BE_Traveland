<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = new Orders;
        $order->date = $request->date;
        $order->total = $request->total;
        $order->tour_guide = $request->tour_guide;
        $order->save();
        return response()->json([
            "message" => "Order Added."
        ], 201);
    }

    public function show($id)
    {
        $order = Orders::find($id);
        if(!empty($order))
        {
            return response()->json($order);
        }
        else
        {
            return response()->json([
                "message" => "Order not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Orders::where('id', $id)->exists()) {
            $order = Orders::find($id);
            $order->date = is_null($request->date) ? $order->date : $request->date;
            $order->total = is_null($request->total) ? $order->total : $request->total;
            $order->tour_guide = is_null($request->tour_guide) ? $order->tourguide : $request->tour_guide;
            $order->save();
            return response()->json([
                "message" => "Order Updated."
            ], 404);
        }else{
            return response()->json([
                "message" => "Order Not Found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Orders::where('id', $id)->exists()) {
            $order = Orders::find($id);
            $order->delete();

            return response()->json([
              "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
              "message" => "Order not found."
            ], 404);
        }
    }
}

