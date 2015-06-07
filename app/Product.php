<?php namespace Treinamento;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'description', 'price'];

}
