<?php

namespace App\Traits;

trait BalanceTrait {

    /**
     * @param \App\User $user
     * @param double $amount
     */
    public function increaseUserBalance($user, $amount) {
        $user->balance += $amount;
        $user->save();
    }  

    /**
     * @param \App\User $user
     * @param double $amount
     */
    public function decreaseUserBalance($user, $amount) {
        $user->balance -= $amount;
        $user->save();
    }
}
