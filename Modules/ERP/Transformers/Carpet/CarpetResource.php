<?php

namespace Modules\ERP\Transformers\Carpet;

use Illuminate\Http\Resources\Json\JsonResource;

class CarpetResource extends JsonResource
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
            'location' => $this->order->location,
            'longtitute' => $this->longtitute,
            'latitute' => $this->latitute,
            'type' => $this->type,
            'status' => $this->status,
            'surface' => $this->surface
        ];
    }
}
