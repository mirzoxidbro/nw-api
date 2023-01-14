<?php

namespace Modules\ERP\Http\UseCases\Carpet;

class StoreCarpetUseCase extends BaseCarpetUseCase
{
    public function execute(array $data)
    {
        $data['surface'] = $data['longtitute'] * $data['latitute'];
        return $this->repository->save($data);
    }
}