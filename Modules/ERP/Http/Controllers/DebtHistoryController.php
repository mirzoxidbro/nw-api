<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\DebtHistory;
use Modules\ERP\Http\Requests\DebtHistory\IndexRequest;
use Modules\ERP\Service\DebtHistory\DebtHistoryService;

class DebtHistoryController extends Controller
{
    public $service;
    public function __construct(DebtHistoryService $service)
    {
        $this->service = $service;
    }
   public function index(IndexRequest $request)
   {
    $params = $request->validated();
    $lists = $this->service->get($params);

    if ($lists)
        return response()->successJson($lists);
    else
        return response()->errorJson('Информация не найдена', 404);
   }
}
