<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carpet extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'longtitute', 'latitute', 'type', 'status', 'surface'];
    

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
