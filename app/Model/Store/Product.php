<?php

namespace App\Model\Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'store_id', 'title', 'slug', 'image', 'weight', 'price', 'stock', 'in_stock', 'variants'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User\User');
    }

    public function storefronts()
    {
        return $this->belongsToMany('App\Model\Store\Storefront', 'storefront_product');
    }

    public function category() {
        return $this->belongsToMany('App\Model\Store\Category', 'category_product');
    }
}