<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Http\Requests\Attendance\StoreAttendanceRequest;
use Modules\ERP\Http\Requests\Attendance\UpdateAttendanceRequest;
use Modules\ERP\Http\UseCases\Attendance\DeleteAttendanceUseCase;
use Modules\ERP\Http\UseCases\Attendance\GetAttendanceUseCase;
use Modules\ERP\Http\UseCases\Attendance\ShowAttendanceUseCase;
use Modules\ERP\Http\UseCases\Attendance\StoreAttendanceUseCase;
use Modules\ERP\Http\UseCases\Attendance\UpdateAttendanceUseCase;

class AttendanceController extends Controller
{
    public function index(GetAttendanceUseCase $useCase)
    {
        $data = $useCase->execute();

        return response()->json(['data' => $data]);
    }

    public function store(StoreAttendanceRequest $request, StoreAttendanceUseCase $useCase)
    {
        $data = $useCase->execute($request->validated());

        return response()->json(['data' => $data]);
    }

    public function update(UpdateAttendanceRequest $request, UpdateAttendanceUseCase $useCase, int $id)
    {
        $data = $useCase->execute($request->validated(), $id);

        return response()->json(['data' => $data]);

    }

    public function show(ShowAttendanceUseCase $useCase, int $id)
    {
        $data = $useCase->execute($id);

        return response()->json(['data' => $data]);
    }

    public function delete(DeleteAttendanceUseCase $useCase, int $id)
    {
        $useCase->execute($id);

        return response()->json(['message' => 'deleted successfully']);
    }
}
