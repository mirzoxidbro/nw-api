<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\TransactionPurpose;

class TransactionPurposeRepository extends BaseRepository
{
    public function __construct(TransactionPurpose $entity)
    {
        $this->entity = $entity;
    }
}