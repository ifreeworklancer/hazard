<?php

namespace App\Models;

use App\Http\Resources\UploadResource;
use App\Traits\SluggableTrait;
use App\Http\Resources\ImageResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

class Product extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    public static $sizes = [
        'xxs',
        'xs',
        's',
        'm',
        'l',
        'xl',
        'xxl',
        'xxxl',
        'xxxxl'
    ];

    protected $fillable = [
        'title',
        'slug',
        'price',
        'material',
        'size',
        'description',
        'category_id',
    ];

    protected $casts = [
        'size' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return false|string
     */
    public function getImagesAttribute()
    {
        return json_encode(ImageResource::collection($this->getMedia('gallery')));
    }

    /**
     * Media
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('products')
            ->registerMediaConversions(function (Media $media = null) {

                $this
                    ->addMediaConversion('gallery')
                    ->width(500)
                    ->height(500);
            });
    }
    public function getImagesListAttribute()
    {
        return UploadResource::collection($this->getMedia('uploads'));
    }
}
