<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price']; 

    public function users()
    {
        return $this->belongsToMany('App\User', 'product_user');
    }      
}
