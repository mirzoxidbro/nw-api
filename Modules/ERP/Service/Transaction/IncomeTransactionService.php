<?php

namespace Modules\ERP\Service\Transaction;

use App\Models\User;
use Modules\ERP\Entities\Order;
use Modules\ERP\Jobs\WalletJob;
use Modules\ERP\Jobs\DebtHistoryJob;
use Modules\ERP\Entities\Transaction;

class IncomeTransactionService
{
    public static function IncomeTransaction($params, $purpose)
    {
        $model = new Transaction();
        $model->amount = $params['amount'];
        $model->description = $params['description'] ?? null;;
        $receiver = auth()->user();

        switch ($purpose->title) {
            case 'from the order':
                $payer = Order::find($params['payer_id']);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
            case 'debt collection':
                $payer = User::find($params['payer_id']);
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
