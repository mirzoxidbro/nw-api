<?php

namespace Modules\ERP\Http\UseCases\Attendance;

class DeleteAttendanceUseCase extends BaseAttendanceUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}