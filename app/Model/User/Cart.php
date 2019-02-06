<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total_price'];
    
    public function user()
    {
        return $this->belongsTo('App\Model\User\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Model\Store\Product');
    }
}
