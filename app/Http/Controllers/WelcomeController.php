<?php namespace Treinamento\Http\Controllers;
	
use Treinamento\Category;

	class WelcomeController extends Controller {

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('guest');
		}

		/**
		 * Show the application welcome screen to the user.
		 *
		 * @return Response
		 */
		public function index()
		{
			
			return view('welcome');

		}

		public function exemplo()
		{
			
			$categories = Category::all();
			return view('exemplo', compact('categories'));
			
		}

	}
