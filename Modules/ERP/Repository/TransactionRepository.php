<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\Transaction;

class TransactionRepository extends BaseRepository
{

    public function __construct(Transaction $entity)
    {
        $this->entity = $entity;   
    }

}