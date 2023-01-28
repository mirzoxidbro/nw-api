<?php

namespace Modules\ERP\Http\Service\TransactionService;

use App\Models\User;
use Modules\ERP\Entities\Order;
use Modules\ERP\Jobs\WalletJob;
use Modules\ERP\Entities\Workman;
use Modules\ERP\Jobs\DebtHistoryJob;
use Modules\ERP\Entities\Transaction;

class IncomeTransactionService
{
    public static function IncomeTransaction($request, $purpose)
    {
        $model = new Transaction();
        $model->amount = $request->amount;
        $model->description = $request->description;
        $receiver = User::find($request->receiver_id);

        switch ($purpose->title) {
            case 'from the order':
                $payer = Order::find($request->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                WalletJob::dispatch($model);
                break;
            case 'debt collection':
                $payer = Workman::find($request->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                // dd($model, $request);
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
