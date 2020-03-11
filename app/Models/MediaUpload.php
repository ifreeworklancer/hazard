<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class MediaUpload extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('uploads')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('gallery')
                    ->fit(Manipulations::FIT_CROP, 500, 500)
                    ->width(500)
                    ->height(500)
                    ->sharpen(10);
            });
    }

}
