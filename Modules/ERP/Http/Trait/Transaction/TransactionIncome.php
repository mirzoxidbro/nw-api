<?php

namespace Modules\ERP\Http\Trait;

use App\Models\User;
use Modules\ERP\Entities\Order;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Jobs\DebtHistoryJob;
use Modules\ERP\Jobs\WalletJob;

trait TransactionIncome
{
    public function TransactionIncome($params, $purpose)
    {
        dd($params, $purpose);
        $model = new Transaction();
        $model->amount = $params->amount;
        $model->description = $params->description;
        $receiver = User::find($params->receiver_id);

        switch ($purpose->title) {
            case 'from the order':
                $payer = Order::find($params->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
            case 'debt collection':
                $payer = User::find($params->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                DebtHistoryJob::dispatch($model);
                break;
            default:
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
        }
        return $model;
    }
}