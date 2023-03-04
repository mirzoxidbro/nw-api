<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Service\User\UserService;
use Modules\ERP\Http\Requests\User\IndexRequest;
use Modules\ERP\Http\Requests\User\StoreRequest;
use Modules\ERP\Http\Requests\User\UpdateRequest;
use Modules\ERP\Http\Requests\User\UpdateProfileRequest;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
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
        $token = $model->createToken('token')->plainTextToken;
        return response()->json([
            'user' => $model,
            'token' => $token,
        ]);
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

    public function profileUpdate(UpdateProfileRequest $request)
    {
        $params = $request->validated();
        $model = $this->service->edit($params, auth()->id());
        if ($model)
            return response()->successJson($model);
        else
            return response()->errorJson('Object not found', 404);
    }

    public function destroy(int $id)
    {
        $model = $this->service->delete($id);
        if ($model) {
            return response()->successJson('Successfully deleted');
        } else {
            return response()->errorJson('Object not found', 404);
        }
    }
}
