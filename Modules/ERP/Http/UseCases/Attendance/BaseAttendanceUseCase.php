<?php

namespace Modules\ERP\Http\UseCases\Attendance;

use Modules\ERP\Repository\AttendanceRepository;

class BaseAttendanceUseCase 
{
    protected AttendanceRepository $repository;

    public function __construct(AttendanceRepository $repository)
    {
        $this->repository = $repository;
    }
}