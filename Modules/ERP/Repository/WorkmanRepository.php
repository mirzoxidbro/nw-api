<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Workman;
use Modules\ERP\Infrastructure\Interfaces\WorkmanRepositoryInterface;

class WorkmanRepository implements WorkmanRepositoryInterface
{
    public function getWorkmans()
    {
        return Workman::query()->select(['id', 'name', 'phone', 'is_archived'])->get();
    }

    public function save(array $data)
    {
        return Workman::create($data);
    }

    public function show(int $id)
    {
        return Workman::query()->findOrFail($id)->get();
    }

    public function update(array $data, int $id)
    {
        $workman = Workman::findOrFail($id);
        $workman->update($data);
        return $workman;
    }

    public function delete(int $id)
    {
        return Workman::findOrFail($id)->delete();
    }
}