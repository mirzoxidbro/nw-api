<?php


namespace Modules\Core\Service;

use App\Http\Requests\User\UserRequest;
use Modules\Core\Repository\UserRepository;

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