<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\Order;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $entity)
    {
        $this->entity = $entity;
    }
}