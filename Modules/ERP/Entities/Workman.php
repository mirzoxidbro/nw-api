<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Workman extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];
    
    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendace::class, 'attendance_worker', 'worker_id', 'attendance_id');
    }

    public function debthistory()
    {
        return $this->hasMany(DebtHistory::class);
    }
}
