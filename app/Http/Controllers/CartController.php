<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Cart;
use CodeCommerce\Product;
use CodeCommerce\Order;
use Session;

class CartController extends Controller
{

    private $cart;

    public function __construct(Cart $cart)
    {
        
        $this->cart = $cart;

    }

    public function index(Request $request)
    {
        // $request->session()->flush();
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }
        // dd(Session::get('cart'));
        return view('store.cart', ['cart'=>Session::get('cart')]);
    }

    public function add($id)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price, isset($product->images->first()->id)?$product->images->first()->id.'.'.$product->images->first()->extension:"");
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

    public function edit($id)
    {
        //
    }

    public function update($id, $qtd)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        $cart->update($id, $qtd);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function end()
    {
        
        $cart = Session::get('cart');
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
        return redirect()->route('account');

    }

}
