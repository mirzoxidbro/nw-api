<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attendace extends Model
{
    use HasFactory;

    protected $fillable = ['date'];
    
    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Workman::class, 'attendance_worker', 'attendance_id', 'worker_id');
    }
}
