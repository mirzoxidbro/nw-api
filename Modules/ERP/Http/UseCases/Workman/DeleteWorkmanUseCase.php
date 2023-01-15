<?php

namespace Modules\ERP\Http\UseCases\Workman;

class DeleteWorkmanUseCase extends BaseWorkmanUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}