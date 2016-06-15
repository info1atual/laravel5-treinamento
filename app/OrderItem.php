<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $table = 'order_items';
    protected $fillable = [
    	'product_id',
    	'price',
    	'qtd',
    	'total'
    ];

    public function product()
    {
    	return $this->hasOne('CodeCommerce\Product', 'id', 'product_id');
    }

    public function order()
    {
    	return $this->belongsTo("CodeCommerce\Order");
    }

}
