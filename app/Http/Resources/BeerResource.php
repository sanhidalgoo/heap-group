<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'brand' => $this->getBrand(),
            'origin' => $this->getOrigin(),
            'avg' => $this->getAbv(),
            'avg_percentage' => $this->getAbvPercentage(),
            'ingredient' => $this->getIngredient(),
            'flavor' => $this->getFlavor(),
            'format' => $this->getFormat(),
            'price' => $this->getPrice(),
            'details' => $this->getDetails(),
            'quantity_available' => $this->getQuantity(),
            'image' => $this->getURL(),
            'average_rate' => $this->getRating()
        ];
    }
}