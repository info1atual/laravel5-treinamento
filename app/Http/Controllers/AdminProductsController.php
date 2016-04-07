<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    public function index()
    {
        return Product::all();
	}

}
