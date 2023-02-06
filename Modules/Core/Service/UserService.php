<?php


namespace Modules\Core\Service;

use App\Http\Requests\User\UserRequest;

class UserService extends BaseService
{
    protected array $filter_fields;

    public function __construct(UserRequest $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'username' => ['type' => 'string']
        ];
    }
}