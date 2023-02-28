<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Order;
use Modules\ERP\Infrastructure\Interfaces\OrderRepositoryInterface;
use Modules\ERP\Transformers\Order\OrderResource;

class OrderRepository implements OrderRepositoryInterface
{
    public function getOrders()
    {
        return OrderResource::collection(Order::query()->with('user:id,username')->paginate(10))->resource;
    }

    public function save(array $data)
    {
        return new OrderResource(Order::create($data));
    }

    public function show(int $id)
    {
        return new OrderResource(Order::findOrFail($id));
    }

    public function update(array $data, int $id)
    {
        $order = Order::findOrFail($id)->get();
        $order->update($data);
        return new OrderResource($order);
    }

    public function delete(int $id)
    {
        return Order::query()->find($id)->delete();
    }
}