<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $fullName = $request->input('fullName');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');
        $products = $request->input('products');

        $order = Order::create([
            'fullName' => $fullName,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'note' => $note,
            'status' => 'ORDERED',
        ]);

        foreach ($products as $product) {
            $order->details()->create([
                'order_id' => $order['id'],
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }

        $order->load('details');

        return response()->json(['data' => $order], 201);
    }
    public function getOrderDetails($id)
    {
        $order = Order::with(['details.product'])->findOrFail($id);

        $details = $order->details->map(function ($detail) {
            return [
                'product_id' => $detail->product->id,
                'product_name' => $detail->product->name,
                'quantity' => $detail->quantity,
                'total_price' => $detail->product->price * $detail->quantity,
            ];
        });
    
        $totalAmount = $details->sum('total_price');
    
        return response()->json([
            'order_id' => $order->id,
            'full_name' => $order->fullName,
            'address' => $order->address,
            'phone' => $order->phone,
            'email' => $order->email,
            'total_amount' => $totalAmount,
            'details' => $details
        ]);
    }
}

