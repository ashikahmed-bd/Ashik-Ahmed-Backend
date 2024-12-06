<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => [
                'min' => $this->min_price,
                'max' => $this->max_price,
            ],
            'billing_cycle' => $this->billing_cycle,
            'features' => $this->whenLoaded('features'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
