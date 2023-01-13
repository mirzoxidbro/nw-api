<?php

namespace Modules\Billing\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'amount', 'user_id'];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
