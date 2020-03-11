<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'material' => $this->material,
            'size' => $this->size,
            'category' => new CategoryResource($this->category),
            'gallery' => $this->hasMedia('uploads')
                ? ImageResource::collection($this->getMedia('uploads'))
                : [['src' => asset('images/noimage.png')]]
        ];
    }
}
