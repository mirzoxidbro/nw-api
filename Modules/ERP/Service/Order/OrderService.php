<?php

namespace Modules\ERP\Service\Order;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\OrderRepository;

class OrderService extends BaseService
{
    protected array $filter_fields;
    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'location' => ['type' => 'string']
        ];
    }
}