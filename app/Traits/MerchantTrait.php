<?php

namespace App\Traits;

use App\User;

trait MerchantTrait {

    /**
     * @return \App\User
     */
    public function getMerchant() {

    	$merchant = User::where('role_id', '=', 1)->first();
    	if($merchant)
    		return $merchant;

    	return null;
    }  

    /**
     * @return \App\Product[]
     */
    public function getMerchantProducts() {

    	$merchant = $this->getMerchant();
    	if($merchant)
    		return $merchant->products;

    	return null;
    }
}
