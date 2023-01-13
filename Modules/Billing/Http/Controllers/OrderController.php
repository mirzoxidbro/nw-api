<?php

namespace Modules\Billing\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Billing\Http\Requests\Order\OrderStoreRequest;
use Modules\Billing\Http\Requests\Order\OrderUpdateRequest;
use Modules\Billing\Http\Services\OrderService;

class OrderController extends Controller
{
    protected OrderService $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(OrderStoreRequest $request)
    {
        $data = $this->service->store($request->validated());
        return response()->json(['data' => $data]);
    }

    public function show(int $id)
    {
        $data = $this->service->show($id);

        return response()->json(['data' => $data]);
    }

    public function update(OrderUpdateRequest $request, int $id)
    {
        $data = $this->service->update($id, $request->validated());

        return response()->json(['data' => $data]);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response()->json([
            'message' => 'deleted succesfully'
        ]);
    }
}
