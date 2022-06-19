<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderdetails
     * @return \Illuminate\Http\Response
     * @param  string  $id
     */
    public function show(int $id)
    {
        try {
            $orderdetails = OrderDetails::findOrFail($id);
            // Lazy eager loading
            $orderdetails->load('quantity');
            $orderdetails->load('payment');
            $orderdetails->load('order_id');
            $orderdetails->load('order_id.user');
            return response($orderdetails, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response("Review tidak ditemukan", 400);
        } catch (\Exception $e) {
            return response("Internal Server Error", 500);
        }
    }
}
