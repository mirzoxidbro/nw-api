<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\Attendance;

class AttendanceRepository extends BaseRepository
{
    public function __construct(Attendance $entity)
    {
        $this->entity = $entity;
    }
}