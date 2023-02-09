<?php

namespace Modules\Core\Http\Controllers\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Requests\Role\IndexRequest;
use Modules\Core\Http\Requests\Role\RoleGetPermissionRequest;
use Modules\Core\Http\Requests\Role\RoleUpdatePermissionRequest;
use Modules\Core\Http\Requests\Role\StoreRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Modules\Core\Service\RoleService;

class RoleController extends Controller
{
    protected RoleService $service;
    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function getRoles(IndexRequest $request)
    {
        $params = $request->validated();
        $lists = $this->service->get($params);

        if ($lists)
            return response()->successJson($lists);
        else
            return response()->errorJson('Object not found', 404);
    }

    public function store(StoreRequest $request)
    {
        $params = $request->all();
        $data = $this->service->create($params);
        if($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Error creating', 409);
    }

    public function roleGetPermission(RoleGetPermissionRequest $request, int $roleId)
    {
        $params = $request->validated();
        $data = $this->service->roleGetPermission($params, $roleId);

        if($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Error', 409);
    }

    public function roleUpdatePermission(RoleUpdatePermissionRequest $request, int $roleId)
    {
        $params = $request->validated();
        $data = $this->service->roleUpdatePermission($params, $roleId);

        if($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Error', 409);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->json([
            'message' => 'Role deleted'
        ]);
    }
}
