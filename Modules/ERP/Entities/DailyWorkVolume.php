<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyWorkVolume extends Model
{
    use HasFactory;

    protected $fillable = ['work_volume'];
    
}
