<?php

namespace Modules\ERP\Http\UseCases\Carpet;

class ShowCarpetUseCase extends BaseCarpetUseCase
{
    public function execute(int $id)
    {
        return $this->repository->show($id);
    }
}