<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Attendance extends Model
{
    use HasFactory;


    protected $fillable = ['date'];
    
    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'attendance_user', 'attendance_id', 'user_id');
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
