<?php

// Author: Santiago Hidalgo

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
                'store_name' => __('messages.store.name'),
                'store_description' => __('messages.store.description'),
                'home_page' => route('user.home.index'),
            ],
        ];
    }
}
