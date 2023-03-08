<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
