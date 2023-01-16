<?php

namespace Modules\ERP\Transformers\Attendance;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\ERP\Transformers\Workers\WorkerResource;

class AttendanceResource extends JsonResource
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
            'date' => $this->date,
            'workers' => WorkerResource::collection($this->workers)
        ];
    }
}
