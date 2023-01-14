<?php

namespace Modules\ERP\Http\UseCases\Order;

use Modules\ERP\Repository\OrderRepository;

class BaseOrderUseCase
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
}