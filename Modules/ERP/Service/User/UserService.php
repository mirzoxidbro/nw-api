<?php

namespace Modules\ERP\Service\User;

use Modules\Core\Service\BaseService;
use Modules\ERP\Repository\UserRepository;

class UserService extends BaseService
{
    protected array $filter_fields;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'username' => ['type' => 'string']
        ];
    }
}
