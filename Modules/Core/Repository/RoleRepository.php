<?php

namespace Modules\Core\Repository;

use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct(Role $entity)
    {
        $this->entity = $entity;
    }
}