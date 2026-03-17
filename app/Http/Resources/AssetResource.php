<?php

namespace App\Http\Resources;

use App\Http\Enums\AssetStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rules\Enum;

class AssetResource extends JsonResource
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
            'serial_number' => $this->serial_number,
            'status' => $this->status,
            'latest_inspections' => InspectionResource::collection($this->whenLoaded('latestThreeInspections'))
        ];
    }
}
