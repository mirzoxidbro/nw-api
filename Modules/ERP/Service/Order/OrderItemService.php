<?php

namespace Modules\ERP\Service\Order;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\OrderItemRepository;

class AttendanceService extends BaseService
{
    public function __construct(OrderItemRepository $repo)
    {
        $this->repo = $repo;
    }
}