<?php

namespace Modules\ERP\Repository;

use Illuminate\Support\Facades\DB;
use Modules\ERP\Entities\Attendace;
use Modules\ERP\Entities\Workman;
use Modules\ERP\Infrastructure\Interfaces\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{
    public function getAttendance()
    {
        return Attendace::query()->paginate(10);
    }

    public function save(array $data)
    {
        $workers = Workman::query()->whereIn('id', $data['workers'])->get();
        $attendance = Attendace::create($data);
        $attendance->workers()->attach($workers);
        return $attendance;
    }

    public function show(int $id)
    {
        return Attendace::query()->findOrFail($id)->get();
    }

    public function update(array $data, int $id)
    {
        $workers = Workman::query()->whereIn('id', $data['workers'])->get();
        DB::table('attendance_worker')->where('attendance_id', $id)->delete();
        $attendance = Attendace::find($id);
        $attendance->update($data);
        $attendance->workers()->attach($workers);
        return $attendance;
    }

    public function delete(int $id)
    {
        $attendance = Attendace::find($id);
        $attendance->workers()->detach();
        $attendance->delete();
    }
}