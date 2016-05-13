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

    public function byCategory($category)
    {
    	$categories = Category::all();
    	$products = Product::with('images')->where('category_id', $category->id);
    	$pFeatured = Product::featured()->where('category_id', $category->id)->get();
    	$pRecommended = Product::recommended()->where('category_id', $category->id)->get();
    	// dd($category);
    	return view('store.index', compact('categories', 'products', 'pFeatured', 'pRecommended'));
    }

}
