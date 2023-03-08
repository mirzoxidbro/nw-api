<?php

namespace Modules\ERP\Service\Transaction;

use App\Models\User;
use Modules\ERP\Jobs\WalletJob;
use Modules\ERP\Jobs\DebtHistoryJob;
use Modules\ERP\Entities\Transaction;

class ExpenseTransactionService
{

    public static function ExpenseTransaction($params, $purpose)
    {
        $model = new Transaction();
        $model->amount = $params['amount'];
        $model->description = $params['description'];
        $payer = auth()->user();

        switch ($purpose->title) {
            case 'lending':
                $receiver = User::find($params['receiver_id']);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                DebtHistoryJob::dispatch($model);
                break;
            case 'debt collection':
                $receiver = User::find($params['receiver_id']);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
            case 'salary distribution' :
                $receiver = User::find($params['receiver_id']);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
            default:
                $model->payer()->associate($payer);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
        }

        return $model;
    }
}
