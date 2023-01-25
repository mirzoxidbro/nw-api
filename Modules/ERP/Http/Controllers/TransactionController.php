<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Http\Service\TransactionService\BaseTransactionService;
use Modules\ERP\Transformers\Transaction\TransactionResource;

class TransactionController extends Controller
{   
    public function alltransactions()
    {
        $transaction = Transaction::query()->with('payer', 'receiver', 'purpose:id,type,title')->latest()->paginate(10);
        return TransactionResource::collection($transaction)->resource;
    } 

    public function transaction(BaseTransactionService $service, Request $request)
    {
        return $service->BaseTransactionService($request);
    }
}
