<?php

namespace Modules\ERP\Http\Service\TransactionService;

use App\Models\User;
use Modules\ERP\Jobs\WalletJob;
use Modules\ERP\Entities\Transaction;

class TransferTransactionService
{
    public static function TransferTransaction($request, $purpose)
    {
        $model = new Transaction();
        $receiver = User::findOrFail($request->receiver_id);
        $payer = User::findOrFail($request->payer_id);
        $model->amount = $request->amount;
        $model->description = $request->description;
        $model->payer()->associate($payer);
        $model->receiver()->associate($receiver);
        $model->purpose()->associate($purpose);
        $model->save();
        WalletJob::dispatch($model);
        return $model;
    }
}
