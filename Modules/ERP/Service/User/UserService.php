<?php

namespace Modules\ERP\Service\User;

use Modules\Core\Service\BaseService;
use Modules\ERP\Events\UserCreated;
use Modules\ERP\Repository\UserRepository;
use Spatie\Permission\Models\Role;

class UserService extends BaseService
{
    protected array $filter_fields;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'username' => ['type' => 'string']
        ];

        $this->relation = [
            'wallet', 'debtHistory'
        ];
    }

    public function create($params)
    {
        $user = $this->repo->store($params);
        event(new UserCreated($user->id));
        return $user;
    }

    public function giveRoleToUser(array $params)
    {
        $user = $this->show($params['user_id']);
        $role = Role::findById($params['role_id']);
        return $user->assignRole($role);
    }
}
