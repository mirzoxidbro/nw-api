<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'amount', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carpets()
    {
        return $this->hasMany(Carpet::class);
    }

    protected $appends = ['username'];

    public function getUsernameAttribute()
    {
        return User::query()->select('name')->find($this->user_id);
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
