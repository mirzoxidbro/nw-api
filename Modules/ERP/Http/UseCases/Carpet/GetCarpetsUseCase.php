<?php

namespace Modules\ERP\Http\UseCases\Carpet;

class GetCarpetsUseCase extends BaseCarpetUseCase
{
    public function execute()
    {
        return $this->repository->getCarpets();
    }
}