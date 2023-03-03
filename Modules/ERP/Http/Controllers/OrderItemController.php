<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Http\Requests\OrderItem\IndexRequest;
use Modules\ERP\Http\Requests\OrderItem\StoreRequest;
use Modules\ERP\Http\Requests\OrderItem\UpdateRequest;
use Modules\ERP\Service\Order\OrderItemService;

class OrderItemController extends Controller
{
    public $service;

    public function __construct(OrderItemService $service)
    {
        $this->service = $service;
        
    }

    public function index(IndexRequest $request)
    {
        $params = $request->validated();
        $lists = $this->service->get($params);

        if ($lists)
            return response()->successJson($lists);
        else
            return response()->errorJson('Информация не найдена', 404);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $data = $this->service->create($params);
        if ($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Ошибка при создании');
    }

    public function show(int $id)
    {
        $data = $this->service->show($id);
        if ($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Информация не найдена', 404);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $params = $request->validated();
        $data = $this->service->edit($params, $id);
        if ($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Ошибка при обновлении', 404);
    }

    public function destroy(int $id)
    {
        $model = $this->service->delete($id);

        if ($model)
            return response()->successJson('Успешно удалено');
        else
            return response()->errorJson('Не удалено', 404);
    }
}
