<?php

namespace App\Http\Resources;

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
            'name'=>$this->name, 
            'description'=>$this->description, 
            'unitPrice'=>$this->unit_price, 
            'promotionPrice'=>$this->promotion_price, 
            'image'=>$this->image, 
            'unit'=>$this->unit,
            'new'=>$this->new
        ];
    }
}
