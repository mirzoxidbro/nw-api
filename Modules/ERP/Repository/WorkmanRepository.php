<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Workman;
use Modules\ERP\Infrastructure\Interfaces\WorkmanRepositoryInterface;
use Modules\ERP\Transformers\Workman\WorkmanResource;

class WorkmanRepository implements WorkmanRepositoryInterface
{
    public function getWorkmans()
    {
        return WorkmanResource::collection(Workman::select('id', 'name', 'phone', 'is_archived', 'updated_at')->paginate(10))->resource;
    }

    public function save(array $data)
    {
        return new WorkmanResource(Workman::create($data));
    }

    public function show(int $id)
    {
       return new WorkmanResource(Workman::find($id)->select('name', 'phone', 'is_archived', 'updated_at'));
    }

    public function update(array $data, int $id)
    {
        $workman = Workman::findOrFail($id);
        $workman->update($data);
        return new WorkmanResource($workman);
    }

    public function delete(int $id)
    {
        return Workman::findOrFail($id)->delete();
    }
}