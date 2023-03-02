<?php

namespace Modules\ERP\Service\Wallet;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\WalletRepository;

class AttendanceService extends BaseService
{
    public function __construct(WalletRepository $repo)
    {
        $this->repo = $repo;
    }
}