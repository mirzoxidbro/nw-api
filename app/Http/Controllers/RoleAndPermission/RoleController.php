<?php

namespace App\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function getRoles()
    {
        return Role::query()->get();
    }

    public function store(Request $request): Model
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        return $role;
    }

    public function roleGetPermission(Request $request, int $roleId)
    {
        $role = Role::query()->findOrFail($roleId);
        $permissions = Permission::query()->whereIn('id', $request->permissionIds)->get();

        foreach($permissions as $permission)
        {
            $role->givePermissionTo($permission);
        }

        return $role;
    }

    public function roleUpdatePermission(Request $request, int $roleId)
    {
        $role = Role::query()->findOrFail($roleId);
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        $permissions = Permission::query()->whereIn('id', $request->permissionIds)->get();

        foreach($permissions as $permission)
        {
            $role->givePermissionTo($permission);
        }

        return $role;

    }

    public function destroy(int $id)
    {
        Role::query()->findOrFail($id)->delete();
        return response()->json([
            'message' => 'Role deleted'
        ]);
    }
}
