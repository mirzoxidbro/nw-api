<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Order;
use Modules\ERP\Infrastructure\Interfaces\OrderRepositoryInterface;
use Modules\ERP\Transformers\Order\OrderResource;

class OrderRepository implements OrderRepositoryInterface
{
    public function getOrders()
    {
        return OrderResource::collection(Order::query()->with('user')->paginate(10));
    }

    public function save(array $data)
    {
        return OrderResource::collection(Order::create($data));
    }

    public function show(int $id)
    {
        return OrderResource::collection(Order::findOrFail($id)->get());
    }

    public function update(array $data, int $id)
    {
        $order = Order::findOrFail($id)->get();
        $order->update($data);
        return OrderResource::collection($order);
    }

    public function delete(int $id)
    {
        return Order::query()->find($id)->delete();
    }
}