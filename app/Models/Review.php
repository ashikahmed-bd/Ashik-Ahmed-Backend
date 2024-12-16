<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    use HasUuids;
    public function getPhotoUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->photo);
    }

    public function getAvatarAttribute(): string
    {
        return asset('images/users/default.png');
    }
}
