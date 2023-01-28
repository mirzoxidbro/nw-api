<?php

namespace Modules\ERP\Transformers\Workman;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ERP\Transformers\DebtHistory\DebtHistoryResource;

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
            'debt history' => DebtHistoryResource::collection($this->debthistory)
        ];
    }
}
