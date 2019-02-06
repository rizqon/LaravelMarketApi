<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Storefront as StorefrontResources;
use App\Http\Resources\Category as CategoryResources;

class Product extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $this->image,
            'weight' => $this->weight,
            'price' => number_format($this->price),
            'stock' => $this->stock,
            'in_stock' => $this->in_stock,
            'category' => CategoryResources::collection($this->category),
            'storefront' => StorefrontResources::collection($this->storefronts),
        ];
    }
}
