<?php

namespace Modules\Core\Repository;

use App\Models\User;

class UserRepository extends BaseRepository 
{
    public function __construct(User $entity)
    {
        $this->entity = $entity;
    }
}