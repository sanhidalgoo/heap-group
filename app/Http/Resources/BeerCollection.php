<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BeerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'additionalData' => [
                'group' =>  __('messages.title'),
                'store_name' => __('messages.store-name'),
                'storeProductsLink' => route('user.cart.index'),
            ],
        ];
    }
}
