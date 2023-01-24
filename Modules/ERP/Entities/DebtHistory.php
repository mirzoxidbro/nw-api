<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DebtHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'transaction_id', 'amount', 'description'];
    
}
