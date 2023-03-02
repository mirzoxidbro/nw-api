<?php

namespace Modules\ERP\Repository;

use App\Models\User;
use Modules\Core\Repository\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $entity)
    {
        $this->entity = $entity;
    }
}