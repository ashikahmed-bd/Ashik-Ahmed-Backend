<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{


    protected $fillable = [
        'name',
        'min_price',
        'max_price',
        'billing_cycle',
        'description',
        'active',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class, 'plan_id');
    }
}
