<?php

namespace Modules\ERP\Http\UseCases\Carpet;

use Modules\ERP\Repository\CarpetRepository;

class BaseCarpetUseCase
{
    protected CarpetRepository $repository;

    public function __construct(CarpetRepository $repository)
    {
        $this->repository = $repository;
    }
}
