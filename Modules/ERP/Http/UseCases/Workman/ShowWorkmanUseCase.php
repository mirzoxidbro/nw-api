<?php

namespace Modules\ERP\Http\UseCases\Workman;

class ShowWorkmanUseCase extends BaseWorkmanUseCase
{
    public function execute(int $id)
    {
        return $this->repository->show($id);
    }
}