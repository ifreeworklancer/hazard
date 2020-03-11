<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Basket extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'price',
        'quantity',
        'size'
    ];

    protected $casts = [
        'user_id' => 'string',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
