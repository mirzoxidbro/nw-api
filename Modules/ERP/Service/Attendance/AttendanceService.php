<?php

namespace Modules\ERP\Service\Attendance;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\Attendance;
use Modules\ERP\Repository\AttendanceRepository;
use Modules\ERP\Transformers\Attendance\AttendanceResource;

class AttendanceService extends BaseService
{
    protected array $filter_fields;
    public function __construct(AttendanceRepository $repo)
    {
        $this->repo = $repo;

        $this->filter_fields = ['date' => ['type' => 'string']];

        $this->relation = ['users:id,username'];
    }

    public function create($params)
    {
        $users = User::query()->whereIn('id', $params['users'])->get();
        $attendance = Attendance::create($params);
        return $attendance->users()->attach($users);
    }

    public function edit($params, $id)
    {
        $users = User::query()->whereIn('id', $params['users'])->get();
        DB::table('attendance_user')->where('attendance_id', $id)->delete();
        $attendance = Attendance::find($id);
        $attendance->update($users);
        return $attendance->workers()->attach($users);
    }
}
