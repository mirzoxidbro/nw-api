<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\DailyWorkVolume;

class DailyWorkVolumeController extends Controller
{

    public function index()
    {
        return DailyWorkVolume::query()->latest('id')->paginate(10);
    }

}
