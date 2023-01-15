<?php

namespace Modules\ERP\Http\UseCases\Workman;

class StoreWorkmanUseCase extends BaseWorkmanUseCase
{
    public function execute(array $data)
    {
        return $this->repository->save($data);
    }
}