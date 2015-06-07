<?php namespace Treinamento\Http\Controllers;

use Treinamento\Category;
use Treinamento\Http\Requests;
use Treinamento\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {

    public function index()
    {
        return Category::all();
	}

}
