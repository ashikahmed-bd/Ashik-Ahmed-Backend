<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasUuids;

    protected $guarded = [];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function getPriceFormatAttribute(): string
    {
        if ($this->min_price > 0){
            return money($this->min_price, 'USD', true)->format();
        }
        return 'Free';
    }
}
