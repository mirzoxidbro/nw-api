<?php

namespace Modules\ERP\Http\UseCases\Workman;

class UpdateWorkmanUseCase extends BaseWorkmanUseCase
{
    public function execute(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }
}