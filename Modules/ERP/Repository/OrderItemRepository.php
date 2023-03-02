<?php

namespace Modules\ERP\Repository;

use Modules\Core\Repository\BaseRepository;
use Modules\ERP\Entities\OrderItem;

class OrderItemRepository extends BaseRepository
{
    public function __construct(OrderItem $entity)
    {
        $this->entity = $entity;
    }
}