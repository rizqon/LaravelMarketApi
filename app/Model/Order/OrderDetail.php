<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    
    protected $fillable = [
        'order_id', 'merchant_id', 'store_id', 'product_id', 'quantity', 'receipt_code', 'price', 'total_price'
    ];

    public function order()
    {
        return $this->belongsTo('App\Model\Order\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Store\Product');
    }

    public function store()
    {
        return $this->belongsTo('App\Model\Store\Store');
    }
}