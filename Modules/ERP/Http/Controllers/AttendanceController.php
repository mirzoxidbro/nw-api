<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Service\Attendance\AttendanceService;
use Modules\ERP\Http\Requests\Attendance\IndexRequest;
use Modules\ERP\Http\Requests\Attendance\StoreRequest;
use Modules\ERP\Http\Requests\Attendance\UpdateRequest;

class AttendanceController extends Controller
{
    public $service;
    public function __construct(AttendanceService $service)
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
            return response()->errorJson('Object not found', 404);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $model = $this->service->create($params);
        return response()->successJson($model);
    }

    public function show(int $id)
    {
        $user = $this->service->show($id);
        if ($user)
            return response()->successJson($user);
        else
            return response()->errorJson('Object not found', 404);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $params = $request->validated();
        $model = $this->service->edit($params, $id);
        if ($model)
            return response()->successJson($model);
        else
            return response()->errorJson('Object not found', 404);
    }

    public function delete(int $id)
    {
        $model = $this->service->delete($id);
        if ($model) {
            return response()->successJson('Successfully deleted');
        } else {
            return response()->errorJson('Object not found', 404);
        }
    }
}
