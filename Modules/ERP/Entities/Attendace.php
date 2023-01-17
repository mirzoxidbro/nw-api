<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Attendace extends Model
{
    use HasFactory;

    protected $with = ['workers'];

    protected $fillable = ['date'];
    
    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Workman::class, 'attendance_worker', 'attendance_id', 'worker_id');
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
