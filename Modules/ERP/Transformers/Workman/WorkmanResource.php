<?php

namespace Modules\ERP\Transformers\Workman;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkmanResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'is_archived' => $this->is_archived,
            'updated_at' => $this->updated_at
        ];
    }
}
