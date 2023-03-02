<?php

namespace Modules\ERP\Service\DebtHistory;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\DebtHistoryRepository;

class AttendanceService extends BaseService
{
    public function __construct(DebtHistoryRepository $repo)
    {
        $this->repo = $repo;
    }
}