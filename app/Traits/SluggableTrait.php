<?php

namespace App\Traits;


use Cviebrock\EloquentSluggable\Sluggable;

trait SluggableTrait
{
    use Sluggable;

    /**
     * Defining default route key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Configuring sluggable
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    /**
     * Get title for slug generating
     * @return string
     */
    public function getSlugTitleAttribute(): string
    {
        return request('title');
    }

}