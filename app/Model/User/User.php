<?php

namespace App\Model\User;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'email', 'password', 'points'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        return $this->hasMany('App\Model\User\Address');
    }

    public function products() 
    {
        return $this->hasMany('App\Model\Store\Product');
    }

    public function storefronts()
    {
        return $this->hasMany('App\Model\Store\Storefront');
    }

    public function carts()
    {
        return $this->hasMany('App\Model\User\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order\Order');
    }
}
