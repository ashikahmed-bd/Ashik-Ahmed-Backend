<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{

    public function getPhotoUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->photo);
    }

    public function getAvatarAttribute(): string
    {
        return asset('images/default.png');
    }
}
