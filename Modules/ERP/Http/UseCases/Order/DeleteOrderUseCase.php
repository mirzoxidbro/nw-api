<?php

namespace Modules\ERP\Http\UseCases\Order;

class DeleteOrderUseCase extends BaseOrderUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }    
}