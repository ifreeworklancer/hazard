<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
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
            'price' => $this->price,
            'quantity' => strval($this->quantity),
            'size' => $this->size,
            'sizes' => $this->product->size,
            'product' => new ProductsResource($this->product)
        ];
    }
}
