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

    protected $fillable = ['name', 'phone', 'is_archived'];
    
    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendace::class, 'attendance_worker', 'worker_id', 'attendance_id');
    }

    protected function isArchived(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == '0' ? 'false' : 'true',
            set: fn($value) => $value == true ? 1 : 0
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }

    public function debthistory()
    {
        return $this->hasMany(DebtHistory::class);
    }
}
