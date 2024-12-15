<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'tags' => [
                'normal' => $this->tagArray,
                'slug' => $this->tagArrayNormalized,
            ],
            'image_url' => $this->image ? $this->image_url : $this->default,
            'disk' => $this->disk,
            'status' => $this->status,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'author' => UserResource::make($this->whenLoaded('author')),
            'published_at' => Carbon::parse($this->published_at)->format('d M, Y'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
