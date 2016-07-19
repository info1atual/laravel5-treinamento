<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Session;
use CodeCommerce\Events\CheckoutEvent;

class CheckoutController extends Controller
{
    public function place(Order $orderModel)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }
        $cart = Session::get('cart');
        if ($cart->getTotal() > 0) {
            $order = Order::create([
                'total'=>$cart->getTotal(),
                'user_id'=>auth()->user()->id,
                'status'=>1
            ]);
            foreach($cart->all() as $k=>$item){
                $order->items()->create([
                    'product_id'=>$k, 
                    'price'=>$item['price'],
                    'qtd'=>$item['qtd'],
                    'total'=>$item['qtd']*$item['price']
                ]);
            }
            $cart->clear();
            event(new \CodeCommerce\Events\CheckoutEvent());
        } else {
            return redirect()->back();
        }
        // return redirect()->route('account.orders');
        return view('store.checkout', compact('order'));

    }

}
