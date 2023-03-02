<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Http\Requests\Transaction\StoreRequest;
use Modules\ERP\Service\Transaction\TransactionService;
use Modules\ERP\Transformers\Transaction\TransactionResource;

class TransactionController extends Controller
{
    public $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function alltransactions()
    {
        $transaction = Transaction::query()->with('payer', 'receiver', 'purpose:id,type,title')->latest()->paginate(10);
        return TransactionResource::collection($transaction)->resource;
    }

    public function transaction(StoreRequest $request)
    {
        $params = $request->validated();

        $data = $this->service->create($params);

        if ($data)
            return response()->successJson($data);
        else
            return response()->errorJson('Ошибка при создании');
    }
}
