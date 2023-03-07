<?php

namespace Modules\ERP\Transformers\OrderItem;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Type\Decimal;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        return [
            'id' => $this->id,
            'location' => $this->order->location,
            'width' => $this->width,
            'height' => $this->height,
            'surface' => $this->surface,
            'type' => $this->type,
            'status' => $this->status,
            'info' => $this->info,
            'updated_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
