<?php

namespace Modules\ERP\Service\User;

use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\DebtHistory;
use Modules\ERP\Entities\Wallet;
use Modules\ERP\Events\UserCreated;
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

    public function create($params)
    {
        $user = $this->repo->store($params);
        event(new UserCreated($user->id));
        return $user;
    }
}
