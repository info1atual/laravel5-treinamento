<?php namespace Treinamento;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
		'name', 
		'description'
		];

	public function products()
	{
		return $this->hasMany('Treinamento\Product');
	}
	
}
