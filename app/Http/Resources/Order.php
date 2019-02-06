<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderDetail as OrderDetailResources;

class Order extends JsonResource
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
            'item' => OrderDetailResources::collection($this->orderDetail),
            'status' => $this->status,
            'method' => $this->method,
            'from_bank' => $this->from_bank,
            'to_bank' => $this->to_bank,
            'amount' => number_format($this->total_payment),
            'date' => $this->created_at->format('Y/m/d H:i:s')

        ];
    }
}
