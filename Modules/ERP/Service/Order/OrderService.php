<?php

namespace Modules\ERP\Service\Order;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\OrderRepository;

class AttendanceService extends BaseService
{
    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;
    }
}