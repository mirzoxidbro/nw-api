<?php

namespace Modules\ERP\Transformers\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location' => $this->location,
            'amount' => $this->amount,
            'user' => $this->user->name
        ];
    }
}
