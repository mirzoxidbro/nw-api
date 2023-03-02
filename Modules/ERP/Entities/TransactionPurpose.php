<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionPurpose extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title'];
}
