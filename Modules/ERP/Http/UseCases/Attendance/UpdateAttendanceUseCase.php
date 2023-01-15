<?php

namespace Modules\ERP\Http\UseCases\Attendance;

class UpdateAttendanceUseCase extends BaseAttendanceUseCase
{
    public function execute(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}