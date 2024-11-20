<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'enabled' => (bool)$this->enabled,
            'plan' => PlanResource::make($this->whenLoaded('plan')),
            'created_at' => $this->created_at,
            'updated_at' => $this->created_at,
        ];
    }
}
