<?php 

$factory->define('CodeCommerce\User', function($faker) {

	return [
		'name'=>$faker->name,
		'email'=>$faker->email,
		'password'=>str_random(10),
		'remember_token'=>str_random(10),
	];

});

$factory->define('CodeCommerce\Category', function($faker) {

	return [
		'name'=>$faker->word,
		'description'=>$faker->sentence,
	];

});

$factory->define('CodeCommerce\Product', function($faker) {

	return [
		'name'=>$faker->word,
		'description'=>$faker->sentence,
		'price'=>$faker->randomFloat(2),
		'category_id'=>$faker->numberBetween(1, 15),
	];

});
