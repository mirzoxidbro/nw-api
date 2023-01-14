<?php

namespace Modules\ERP\Http\UseCases\Carpet;

class UpdateCarpetUseCase extends BaseCarpetUseCase
{
    public function execute(array $data, int $id)
    {
        $data['surface'] = $data['longtitute'] * $data['latitute'];
        return $this->repository->update($data, $id);
    }
}