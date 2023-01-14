<?php

namespace Modules\ERP\Http\UseCases\Order;

class ShowOrderUseCase extends BaseOrderUseCase
{
    public function execute(int $id)
    {
        return $this->repository->show($id);
    }    
}