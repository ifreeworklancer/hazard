<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use App\Http\Resources\ImageResource;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;


class Page extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    protected $fillable = [
        'title',
        'slug',
        'body'
    ];

    /**
     * @return false|string
     */
    public function getImagesAttribute()
    {
        return json_encode(ImageResource::collection($this->getMedia('gallery')));
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('pages'));
    }

    /**
     * Media
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('pages')
            ->registerMediaConversions(function (Media $media = null) {

                $this
                    ->addMediaConversion('pages')
                    ->width(500)
                    ->height(500);
            });
    }
}
