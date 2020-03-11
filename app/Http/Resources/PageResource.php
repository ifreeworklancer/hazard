<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'body' => $this->body,
            'gallery' => $this->hasMedia('pages')
                ? ImageResource::collection($this->getMedia('pages'))
                : [['src' => asset('images/noimage.png')]]
        ];
    }
}
