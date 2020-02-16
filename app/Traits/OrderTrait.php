<?php

namespace App\Traits;

use App\Order;

trait OrderTrait { 

    /**
     * @return \App\Order
     */
    public function createOrderFromCart($cart, $user) {

        $order = Order::create(['order_json'=>json_encode($cart), 'user_id'=>$user->id]);
        return $order;        
    }
}
