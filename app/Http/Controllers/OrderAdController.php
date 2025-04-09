<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderAdController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('limit');
        $curPage = $request->input('page');
        $orders = Order::with(['details.product'])->paginate($perPage, ['*'], 'page', $curPage);
        return response()->json(['data' => $orders], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['details.product'])
                      ->findOrFail($id);
        return response()->json(['data' => $order], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
   {
       $order = Order::findOrFail($id);
       $order->status = $request->input('status');
       $order->save();

       return response()->json(['data' => $order], 200);
   }
}                                                                                                                   
