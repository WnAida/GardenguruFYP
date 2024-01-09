<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VegetableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=> $this->name,
            'description'=> $this->description,
            'note'=> $this->note,
            'photo'=> Storage::disk('public')->url($this->photo),
            'pests' => PestResource::collection($this->pests),
            'guidances' => GuidanceResource::collection($this->guidances),
        ];
    }
}
