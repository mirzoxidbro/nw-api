<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourierWallet extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'user_id', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    

}
