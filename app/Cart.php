<?php

namespace App;

class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($cart = null)
    {
    	if($cart) {
    		$this->items = $cart->items;
    		$this->totalQuantity = $cart->totalQuantity;
    		$this->totalPrice = $cart->totalPrice;
    	}
    }

    public function add($product) {
    	$item = [
    		'name' => $product->name,
    		'description' => $product->description,
    		'price' => $product->price,
    		'quantity' => 1		
    	];

    	if(!array_key_exists($product->id, $this->items)) {
    		$this->items[$product->id] = $item;
    		$this->totalQuantity += 1;
    		$this->totalPrice += $product->price;
    	} else {
    		$this->totalQuantity += 1;
            $this->totalPrice += $product->price;
    		$this->items[$product->id]['quantity'] += 1;
    	}
    }
}
