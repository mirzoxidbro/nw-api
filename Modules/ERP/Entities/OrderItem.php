<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'width', 'height', 'type', 'status', 'surface', 'info'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    

    protected $with = ['order'];
}
