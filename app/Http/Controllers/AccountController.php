<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::with('items')->where('user_id', auth()->user()->id)->get();
        // dd($orders);
        return view('store.orders', compact('orders'));

    }

    public function orders()
    {
        
        $orders = auth()->user()->orders;
        // dd($orders);
        return view('store.orders', compact('orders'));
        
    }

}
