<?php

namespace Modules\ERP\Http\UseCases\Workman;

class GetWorkmanUseCase extends BaseWorkmanUseCase
{
    public function execute()
    {
        return $this->repository->getWorkmans();
    }
}