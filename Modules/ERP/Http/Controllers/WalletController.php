<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ERP\Entities\Wallet;
use Illuminate\Routing\Controller;

class WalletController extends Controller
{
    public function index()
    {
        return Wallet::query()->with('user')->get();
    }

}
