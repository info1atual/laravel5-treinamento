<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Treinamento\Category;

class CategoryTableSeeder extends Seeder
{
	
	public function run()
	{
		
		DB::table('categories')->truncate();

		factory('Treinamento\Category', 10)->create();

	}
}