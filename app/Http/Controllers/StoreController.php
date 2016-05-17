<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    
    public function index()
    {
    	
        $categories = Category::all();
    	$pFeatured = Product::featured()->get();
    	$pRecommended = Product::recommended()->get();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));

    }

    public function category($category)
    {
        
        $categories = Category::all();
        $products = Product::ofCategory($category->id)->get();
    	// dd($id);
    	return view('store.category', compact('categories', 'products', 'category'));

    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
           
    }
}
