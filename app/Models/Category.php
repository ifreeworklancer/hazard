<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\SluggableTrait;

class Category extends Model
{
    use SluggableTrait;

    protected $fillable = [
        'title',
        'slug',
        'order'
    ];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
