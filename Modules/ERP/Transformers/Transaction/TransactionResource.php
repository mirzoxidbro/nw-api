<?php

namespace Modules\ERP\Transformers\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class TransactionResource extends JsonResource
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
            'amount' => $this->amount,
            'description' => $this->description,
            'receiver' => $this->receiver->username ?? null,
            'payer' => $this->payer ? ($this->payer->username ? $this->payer->username : $this->payer->location) : null,
            'purpose_title' => $this->purpose->title,
            'purpose_type' => $this->purpose->type,
            'created_at' =>  Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
