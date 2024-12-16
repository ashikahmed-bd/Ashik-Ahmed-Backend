<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class License extends Model
{

    use HasUuids;
    protected $guarded = [];


    protected $appends = [
        'expires_in',
    ];

    public function getExpiresInAttribute()
    {
        if ($this->expiration_date < now()) {
            return 0;
        }
        return Carbon::now()->diffInDays($this->expiration_date);
    }

    public function getStatusAttribute($value)
    {
        if ($this->expiration_date < now()) {
            return 'expired';
        }
        return $value;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
