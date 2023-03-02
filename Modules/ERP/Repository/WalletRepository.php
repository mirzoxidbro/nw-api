<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\Wallet;

class WalletRepository extends BaseRepository
{
    public function __construct(Wallet $entity)
    {
        $this->entity = $entity;
    }
}