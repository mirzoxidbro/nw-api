<?php

namespace Modules\Core\Service;

use Illuminate\Support\Facades\DB;
use Modules\Core\Repository\RoleRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService extends BaseService
{
    protected array $filter_fields;
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = [
            'name' => ['type' => 'string']
        ];

        $this->relation = ['permissions:id,name'];
    }

    public function create($params)
    {
        return Role::create(['name' => $params['name'], 'guard_name' => 'web']); 
    }

    public function roleGetPermission($params, int $roleId)
    {
        $role = Role::query()->findOrFail($roleId);
        $permissions = Permission::query()->whereIn('id', $params['permissionIds'])->get();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        return $role;
    }

    public function roleUpdatePermission($params, int $roleId)
    {
        $role = Role::query()->findOrFail($roleId);
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        $permissions = Permission::query()->whereIn('id', $params['permissionIds'])->get();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        return $role;
    }
}