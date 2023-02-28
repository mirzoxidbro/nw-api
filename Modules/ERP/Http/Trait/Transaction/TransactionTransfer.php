<?php

namespace Modules\ERP\Http\Trait;

use App\Models\User;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Jobs\WalletJob;

trait TransactionTransfer
{
    public function TransactionTransfer($params, $purpose)
    {
        $model = new Transaction();
        $receiver = User::findOrFail($params->receiver_id);
        $payer = User::findOrFail($params->payer_id);
        $model->amount = $params->amount;
        $model->description = $params->description;
        $model->payer()->associate($payer);
        $model->receiver()->associate($receiver);
        $model->purpose()->associate($purpose);
        $model->save();
        WalletJob::dispatch($model);
        return $model;
    }
}