<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\DebtHistory;

class DebtHistoryController extends Controller
{

   public function store(Request $request)
   {
        $debthistory = new DebtHistory();
        $debthistory->workman_id = $request->workman_id;
        $debthistory->save();
        return $debthistory;
   }
}
