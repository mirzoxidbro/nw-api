<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Carpet extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'longtitute', 'latitute', 'type', 'status', 'surface'];
    

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
