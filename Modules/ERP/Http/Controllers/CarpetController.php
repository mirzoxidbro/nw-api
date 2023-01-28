<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Http\UseCases\Carpet\GetCarpetsUseCase;
use Modules\ERP\Http\UseCases\Carpet\ShowCarpetUseCase;
use Modules\ERP\Http\UseCases\Carpet\StoreCarpetUseCase;
use Modules\ERP\Http\Requests\Carpet\CarpetStoreRequest;
use Modules\ERP\Http\Requests\Carpet\CarpetUpdateRequest;
use Modules\ERP\Http\UseCases\Carpet\DeleteCarpetUseCase;
use Modules\ERP\Http\UseCases\Carpet\UpdateCarpetUseCase;

class CarpetController extends Controller
{
    public function index(GetCarpetsUseCase $useCase)
    {
        $data = $useCase->execute();

        return response()->json(['data' => $data]);
    }

    public function store(CarpetStoreRequest $request, StoreCarpetUseCase $useCase)
    {
        $data = $useCase->execute($request->validated());
        return response()->json(['data' => $data]);
    }

    public function show(int $id, ShowCarpetUseCase $useCase)
    {
        $data = $useCase->execute($id);
        return response()->json(['data' => $data]);
    }

    public function update(CarpetUpdateRequest $request, UpdateCarpetUseCase $useCase, int $id)
    {
        $data = $useCase->execute($request->validated(), $id);

        return response()->json(['data' => $data]);
    }

    public function delete(DeleteCarpetUseCase $useCase, int $id)
    {
        $useCase->execute($id);

        return response()->json(['message' => 'Deleted Successfully']);
    }
}