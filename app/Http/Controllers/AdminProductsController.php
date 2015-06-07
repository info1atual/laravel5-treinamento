<?php namespace Treinamento\Http\Controllers;

use Treinamento\Http\Requests;
use Treinamento\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Treinamento\Product;

class AdminProductsController extends Controller {

    public function index()
    {
        return Product::all();
	}

}
