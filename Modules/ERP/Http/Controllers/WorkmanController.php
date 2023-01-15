<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Http\Requests\Worker\WorkerStoreRequest;
use Modules\ERP\Http\Requests\Worker\WorkerUpdateRequest;
use Modules\ERP\Http\UseCases\Workman\DeleteWorkmanUseCase;
use Modules\ERP\Http\UseCases\Workman\GetWorkmanUseCase;
use Modules\ERP\Http\UseCases\Workman\ShowWorkmanUseCase;
use Modules\ERP\Http\UseCases\Workman\StoreWorkmanUseCase;
use Modules\ERP\Http\UseCases\Workman\UpdateWorkmanUseCase;

class WorkmanController extends Controller
{
    public function index(GetWorkmanUseCase $useCase)
    {
        $data = $useCase->execute();

        return response()->json(['data' => $data]);
    }

    public function store(WorkerStoreRequest $request, StoreWorkmanUseCase $useCase)
    {
        $data = $useCase->execute($request->validated());

        return response()->json(['data' => $data]);
    }

    public function show(int $id, ShowWorkmanUseCase $useCase)
    {
        $data = $useCase->execute($id);

        return response()->json(['data' => $data]);
    }

    public function update(WorkerUpdateRequest $request, UpdateWorkmanUseCase $useCase, int $id)
    {
        $data = $useCase->execute($request->validated(), $id);

        return response()->json(['data' => $data]);
    }

    public function delete(DeleteWorkmanUseCase $useCase, int $id)
    {
        $useCase->execute($id);

        return response()->json(['message' => 'Deleted Successfully']);
    }
}
