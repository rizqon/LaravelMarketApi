<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product as ProductResources;
use App\Http\Resources\User as UserResources;

class OrderDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => new ProductResources($this->product),
            $this->mergeWhen($request->user()->hasRole('merchant'), [
                'customer' => new UserResources($this->order->user),
                'date' => $this->created_at->format('Y/m/d H:i:s')
            ]),
            'order_quantity' => $this->quantity,
            'price' => number_format($this->price),
            'total_price' => number_format($this->total_price)
        ];
    }
}