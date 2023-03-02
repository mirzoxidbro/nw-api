<?php

namespace Modules\ERP\Service\Attendance;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\AttendanceRepository;

class AttendanceService extends BaseService
{
    public function __construct(AttendanceRepository $repo)
    {
        $this->repo = $repo;
    }
}
