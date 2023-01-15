<?php

namespace Modules\ERP\Http\UseCases\Attendance;

class StoreAttendanceUseCase extends BaseAttendanceUseCase
{
    public function execute(array $data)
    {
        return $this->repository->save($data);
    }
}