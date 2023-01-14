<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Http\Requests\Order\OrderStoreRequest;
use Modules\ERP\Http\Requests\Order\OrderUpdateRequest;
use Modules\ERP\Http\UseCases\Order\DeleteOrderUseCase;
use Modules\ERP\Http\UseCases\Order\GetOrdersUseCase;
use Modules\ERP\Http\UseCases\Order\ShowOrderUseCase;
use Modules\ERP\Http\UseCases\Order\StoreOrderUseCase;
use Modules\ERP\Http\UseCases\Order\UpdateOrderUseCase;

class OrderController extends Controller
{
    public function index(GetOrdersUseCase $useCase)
    {
        $data = $useCase->execute();

        return response()->json(['data' => $data]);
    }

    public function store(StoreOrderUseCase $useCase, OrderStoreRequest $request)
    {
        $data = $useCase->execute($request->validated());

        return response()->json(['data' => $data]);
    }

    public function show(ShowOrderUseCase $useCase, int $id)
    {
        $data = $useCase->execute($id);
    }

    public function update(UpdateOrderUseCase $useCase, int $id, OrderUpdateRequest $request)
    {
        $data = $useCase->execute($request->validated(), $id);
    }

    public function destroy(DeleteOrderUseCase $useCase, int $id)
    {
        $useCase->execute($id);

        return response()->json(['message' => 'Order Deleted']);
    }
}
