<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Order\OrderDetail;
use App\Model\Store\Product;

class CreateOrderDetail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        foreach($event->user->carts as $item){
            OrderDetail::create([
                'order_id' => $event->order->id,
                'merchant_id' => Product::find($item->product_id)->user_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'receipt_code' => '',
                'price' => Product::find($item->product_id)->price,
                'total_price' => $item->total_price
            ]);
        }
    }
}
