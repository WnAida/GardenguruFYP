<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description'=> $this->description,
            'quantity'=> $this->quantity,
            'category'=> $this->category_label,
            'price'=> $this->price,
            'min_order_qty'=> $this->min_order_qty,
            'photo_path'=> $this->photo_path,
        ];
    }
}
