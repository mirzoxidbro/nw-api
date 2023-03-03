<?php

namespace Modules\ERP\Service\Attendance;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\AttendanceRepository;

class AttendanceService extends BaseService
{
    protected array $filter_fields;
    public function __construct(AttendanceRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = ['date' => ['type' => 'string']];

        $this->relation = ['users:id,username'];
    }
}
