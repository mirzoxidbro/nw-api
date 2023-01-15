<?php

namespace Modules\ERP\Http\UseCases\Workman;

use Modules\ERP\Repository\WorkmanRepository;

class BaseWorkmanUseCase
{
    protected WorkmanRepository $repository;

    public function __construct(WorkmanRepository $repository)
    {
        $this->repository = $repository;
    }
}