<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
