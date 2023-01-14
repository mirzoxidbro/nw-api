<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Carpet;
use Modules\ERP\Infrastructure\Interfaces\CarpetRepositoryInterface;

class CarpetRepository implements CarpetRepositoryInterface
{
    public function getCarpets()
    {
        return Carpet::query()->paginate(10);
    }

    public function save(array $data)
    {
        return Carpet::create($data);
    }

    public function show(int $id)
    {
        return Carpet::findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $carpet = Carpet::findOrFail($id);
        $carpet->update($data);
        return $carpet;
    }

    public function delete(int $id)
    {
        return Carpet::query()->findOrFail($id)->delete();
    }
}