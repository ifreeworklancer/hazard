<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * @var array
     */
    public static $STATUSES = [
        'processing',
        'finished',
        'rejected'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'status',
        'message'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function baskets(): HasMany
    {
        return $this->hasMany(Basket::class);
    }


}
