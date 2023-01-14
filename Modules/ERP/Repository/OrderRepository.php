<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Order;
use Modules\Infrastructure\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function getOrders()
    {
        return Order::query()->paginate(10);
    }

    public function save(array $data)
    {
        return Order::create($data);
    }

    public function show(int $id)
    {
        return Order::findOrFail($id)->get();
    }

    public function update(array $data, int $id): bool|int
    {
        return Order::findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        return Order::query()->find($id)->delete();
    }
}