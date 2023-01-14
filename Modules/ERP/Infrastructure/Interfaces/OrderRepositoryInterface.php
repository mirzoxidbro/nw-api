<?php

namespace Modules\ERP\Infrastructure\Interfaces;

interface OrderRepositoryInterface
{
    public function getOrders();

    public function save(array $data);

    public function show(int $id);

    public function update(array $data, int $id);

    public function delete(int $id);
}

