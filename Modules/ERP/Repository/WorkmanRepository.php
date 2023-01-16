<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Workman;
use Modules\ERP\Infrastructure\Interfaces\WorkmanRepositoryInterface;
use Modules\ERP\Transformers\Workman\WorkmanResource;

class WorkmanRepository implements WorkmanRepositoryInterface
{
    public function getWorkmans()
    {
        return WorkmanResource::collection(Workman::query()->get());
    }

    public function save(array $data)
    {
        return WorkmanResource::collection(Workman::create($data));
    }

    public function show(int $id)
    {
        return WorkmanResource::collection(Workman::query()->findOrFail($id)->get());
    }

    public function update(array $data, int $id)
    {
        $workman = Workman::findOrFail($id);
        $workman->update($data);
        return WorkmanResource::collection($workman);
    }

    public function delete(int $id)
    {
        return Workman::findOrFail($id)->delete();
    }
}