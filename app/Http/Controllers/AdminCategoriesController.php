<?php namespace Treinamento\Http\Controllers;

use Treinamento\Category;
use Treinamento\Http\Requests;
use Treinamento\Http\Controllers\Controller;
use Illuminate\Http\Request;

	class AdminCategoriesController extends Controller {

		private $categories;

		public function __construct(Category $category)
		{
			$this->middleware('guest');
			$this->categories = $category;
		}

	    public function index()
	    {

	        return Category::all();
	        
		}

		public function editar(Category $category)
		{
						
			return $category->all();

		}

	}
