<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
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

		public function editar($category)
		{
						
			return $category->name;

		}

	}
