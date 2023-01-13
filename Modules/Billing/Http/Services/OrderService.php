<?php

namespace Modules\Billing\Http\Services;

use Modules\Billing\Entities\Order;
use Modules\Billing\Http\Repository\OrderRepository;

class OrderService
{
    public function index()
    {
        $order = Order::query()->get();
        return $order;
    }

    public function store(array $data)
    {
        $order = Order::create($data);
        return $order;
    }

    public function show(int $id)
    {
        $order = Order::find($id);
        return $order;
    }

    public function update(int $id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    public function delete(int $id)
    {
        Order::findOrFail($id)->delete();
    }
}