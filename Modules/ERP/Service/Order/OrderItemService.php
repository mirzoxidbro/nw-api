<?php

namespace Modules\ERP\Service\Order;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\OrderItemRepository;

class OrderItemService extends BaseService
{
    protected array $filter_fields;
    public function __construct(OrderItemRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'status' => ['type' => 'string'],
            'type' => ['type' => 'string']
        ];
    }
}