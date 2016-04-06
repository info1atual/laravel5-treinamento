<?php namespace Treinamento;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
    	'name', 
    	'description', 
    	'price',
    	'featured',
    	'recommended',
    	'category_id',
    	];
    
    public function images()
    {
        return $this->hasMany('Treinamento\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('Treinamento\Category');
    }
    
}
