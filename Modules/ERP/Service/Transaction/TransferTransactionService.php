<?php

namespace Modules\ERP\Service\Transaction;

use App\Models\User;
use Modules\ERP\Jobs\WalletJob;
use Modules\ERP\Entities\Transaction;

class TransferTransactionService
{
    public static function TransferTransaction($params, $purpose)
    {
        $model = new Transaction();
        $receiver = auth()->user();
        $payer = User::findOrFail($params['payer_id']);
        $model->amount = $params['amount'];
        $model->description = $params['description'] ? $params['description'] : null;
        $model->payer()->associate($payer);
        $model->receiver()->associate($receiver);
        $model->purpose()->associate($purpose);
        $model->save();
        WalletJob::dispatch($model);
        return $model;
    }
}
