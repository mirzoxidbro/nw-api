<?php

namespace Modules\ERP\Http\UseCases\Order;

class GetOrdersUseCase extends BaseOrderUseCase
{
    public function execute()
    {
        return $this->repository->getOrders();
    }    
}