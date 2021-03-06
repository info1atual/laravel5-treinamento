<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'total',
    	'user_id',
    	'status'
    ];

    public function items()
    {
    	return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo("CodeCommerce\User");
    }

    public function product()
    {
    	return $this->belongsTo("CodeCommerce\Product");
    }
}
