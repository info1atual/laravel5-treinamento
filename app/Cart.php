<?php

namespace CodeCommerce;

class Cart 
{
    
    private $items;

    public function __construct()
    {
    	
    	$this->items = [];

    }

    public function add($id, $idProduct, $name, $price, $qtd=0, $img="")
    {
    	
    	$this->items += [
    		$id = [
    			'idProduct'=>$idProduct,
    			'img'=>$img,
	    		'qtd'=>isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
	    		'price'=>$price,
	    		'name'=>$name
    		],
    	];

    	return $this->items;
    }

    public function update($id, $qtd=0)
    {
    	
    	$this->items += [
    		$id = [
	    		'qtd'=>$this->items[$id]['qtd'] = $qtd,
    		],
    	];

    	return $this->items;
    }

    public function remove($id) 
    {

    	unset($this->items[$id]);

    }

    public function all()
    {
    	
    	return $this->items;

    }

    public function getTotal()
    {
    	
    	$total = 0;
    	// dd($this->items['qtd']);
    	foreach ($this->items as $item) {
    		$total += $item['qtd'] * $item['price'];
    	}
    	return $total;
    }

}
