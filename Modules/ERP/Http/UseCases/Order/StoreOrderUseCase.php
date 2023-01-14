<?php

namespace Modules\ERP\Http\UseCases\Order;

class StoreOrderUseCase extends BaseOrderUseCase
{
    public function execute(array $data)
    {
        return $this->repository->save($data);
    }
}