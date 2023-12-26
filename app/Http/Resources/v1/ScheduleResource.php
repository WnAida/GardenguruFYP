<?php

namespace App\Http\Resources\v1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'location'=> $this->location,
            'planted_at'=> Carbon::parse($this->planted_at)->format('d M Y'),
            'notes'=> $this->notes,
            'stage'=> $this->stage_label,
            'seed'=> $this->seed,
            'photo_path'=> $this->photo_path,
        ];
    }
}
