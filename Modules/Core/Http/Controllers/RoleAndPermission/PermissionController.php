<?php

namespace Modules\Core\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function getPermissions()
    {
        return Permission::query()->get();
    }
}
