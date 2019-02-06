<?php

namespace App\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'address_id', 'status', 'method', 'from_bank', 'to_bank', 'total_payment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Model\User\Address');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Model\Order\OrderDetail');
    }
}
