<?php namespace CodeCommerce;

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
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getNameDescriptionAttribute()
    {
        return $this->name.' - '.$this->description;
    }
    
    public function getTotalAttribute()
    {
        return $this->sum('price');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(',', $tags);
    }

}
