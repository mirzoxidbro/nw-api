<?php

namespace Modules\ERP\Http\UseCases\Order;

class UpdateOrderUseCase extends BaseOrderUseCase
{
    public function execute(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }    
}