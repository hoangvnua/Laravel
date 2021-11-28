<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:confirm-order, dong-goi, ship, ship-false, cancel-order');
    }

    public function index()
    {
        $orders = Order::get();

        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show')->with([
            'order' => $order
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request['status'];
        $order->save();
        return redirect()->route('backend.orders.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->status = 5;
        $order->save();
        return redirect()->route('backend.orders.index');
    }
}
