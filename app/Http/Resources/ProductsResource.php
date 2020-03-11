<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'category' => new CategoryResource($this->category),
            'gallery' => $this->hasMedia('uploads')
                ? new ImageResource($this->getFirstMedia('uploads'))
                : ['src' => asset('images/noimage.png')]
        ];
    }
}
