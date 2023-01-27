<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_id',
        'receiver_type',
        'purpose_id',
        'purpose_type',
        'payer_id',
        'payer_type',
        'amount',
        'description',
        'type'
    ];
    
    public function payer()
    {
        return $this->morphTo();
    }

    public function receiver()
    {
        return $this->morphTo();
    }

    public function purpose()
    {
        return $this->morphTo();
    }

    public function debthistory()
    {
        return $this->hasMany(DebtHistory::class);
    }
}
