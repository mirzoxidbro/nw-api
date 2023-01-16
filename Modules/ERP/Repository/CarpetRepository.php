<?php

namespace Modules\ERP\Repository;

use Modules\ERP\Entities\Carpet;
use Modules\ERP\Infrastructure\Interfaces\CarpetRepositoryInterface;
use Modules\ERP\Transformers\Carpet\CarpetResource;

class CarpetRepository implements CarpetRepositoryInterface
{
    public function getCarpets()
    {
        return CarpetResource::collection(Carpet::query()->paginate(10));
    }

    public function save(array $data)
    {
        return CarpetResource::collection(Carpet::create($data));
    }

    public function show(int $id)
    {
        return CarpetResource::collection(Carpet::findOrFail($id));
    }

    public function update(array $data, int $id)
    {
        $carpet = Carpet::findOrFail($id);
        $carpet->update($data);
        return CarpetResource::collection($carpet);
    }

    public function delete(int $id)
    {
        return Carpet::query()->findOrFail($id)->delete();
    }
}