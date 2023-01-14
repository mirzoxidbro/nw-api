<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
