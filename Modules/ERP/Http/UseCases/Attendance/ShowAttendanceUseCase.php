<?php

namespace Modules\ERP\Http\UseCases\Attendance;

class ShowAttendanceUseCase extends BaseAttendanceUseCase
{
    public function execute(int $id)
    {
        return $this->repository->show($id);
    }
}