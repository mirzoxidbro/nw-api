<?php

namespace Modules\ERP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DebtHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'transaction_id', 'amount', 'description'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
