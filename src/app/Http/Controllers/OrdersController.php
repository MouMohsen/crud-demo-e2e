<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrdersController extends Controller
{    
    /**
     * list all orders
     *
     * @return void
     */
    public function index()
    {
       $orders = Order::get();
       return view('orders.index', compact('orders'));
    }
    
    /**
     * show edit order form
     *
     * @param  mixed $request
     * @param  mixed $orderId
     * @return void
     */
    public function edit(Request $request, $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        return view('orders.edit', compact('order'));
    }
    
    /**
     * update order
     *
     * @return void
     */
    public function update(Request $request, $orderId)
    {
        $params = $request->all();
        unset($params['_token']);
        
        Order::where('id', $orderId)->update($params);
        return redirect()->route('home');
    }

    public function create()
    {
        return view('orders.edit');
    }

    public function store(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);

        Order::create($params);
        return redirect()->route('home');
    }
    
    /**
     * delete order
     *
     * @return void
     */
    public function destroy(Request $request)
    {
        $orderId = $request->input('orderId');

        Order::destroy($orderId);

        return response()->json([
            "message" => "Order #$orderId Deleted"
        ]);
    }

    public function seed()
    {
        Artisan::call('db:seed --class=OrdersSeeder');
        return redirect()->route('home');
    }
}
