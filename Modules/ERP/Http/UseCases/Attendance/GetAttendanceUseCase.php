<?php

namespace Modules\ERP\Http\UseCases\Attendance;

class GetAttendanceUseCase extends BaseAttendanceUseCase
{
    public function execute()
    {
        return $this->repository->getAttendance();
    }
}