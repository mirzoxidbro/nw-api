<?php

namespace Modules\ERP\Transformers\DebtHistory;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class DebtHistoryResource extends JsonResource
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
            'transaction_id' => $this->transaction_id,
            'amount' => $this->amount,
            'description' => $this->description,
            'updated_at' => Carbon::parse($this->updated_at)->diffForHumans()
        ];
    }
}
