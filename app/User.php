<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'balance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_user');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function isMerchant()
    {
        if($this->role_id == 1)
            return true;

        return false;
    }

    public function isClient()
    {
        if($this->role_id == 2)
            return true;

        return false;
    }    
}
