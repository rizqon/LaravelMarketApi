<?php

namespace App\Model\Store;

use Illuminate\Database\Eloquent\Model;

class Storefront extends Model
{
    protected $fillable = [
        'store_id', 'name', 'slug'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Model\Store\Product', 'storefront_product');
    }
}
