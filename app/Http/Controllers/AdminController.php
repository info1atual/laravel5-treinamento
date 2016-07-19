<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class AdminController extends Controller
{
    
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;

    }

    public function index()
    {
        return view('home');
    }

    public function orders()
    {
        
        $orders = $this->order->all();
        // dd($orders);
        return view('admin.orders', compact('orders'));
        
    }

    public function status(Request $request)
    {
        $pedido = $this->order->find($request->pedido);
        $pedido->status = 0;
        $pedido->save();
        return redirect()->back();
    }

}
