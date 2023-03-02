<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\DebtHistory;

class DebtHistoryRepository extends BaseRepository
{
    public function __construct(DebtHistory $entity)
    {
        $this->entity = $entity;
    }
}