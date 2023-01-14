<?php

namespace Modules\ERP\Http\UseCases\Carpet;

class DeleteCarpetUseCase extends BaseCarpetUseCase
{
    public function execute(int $id)
    {
        return $this->repository->delete($id);
    }
}