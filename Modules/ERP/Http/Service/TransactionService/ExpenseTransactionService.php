<?php

namespace Modules\ERP\Http\Service\TransactionService;

use App\Models\User;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Entities\Workman;
use Modules\ERP\Jobs\CourierCashJob;

class ExpenseTransactionService 
{

    public static function ExpenseTransaction($request, $purpose)
    {
        $model = new Transaction();
        $model->amount = $request->amount;
        $model->description = $request->description;
        $payer = User::find($request->payer_id);
        switch ($purpose) {
            case 'lending':
                $receiver = Workman::find($request->receiver_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                CourierCashJob::dispatch($model);
                break;
            case 'debt collection':
                $receiver = Workman::find($request->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                $model->save();
                CourierCashJob::dispatch($model);
                break;
            default:
                $model->payer()->associate($payer);
                $model->purpose()->associate($purpose);
                $model->save();
                CourierCashJob::dispatch($model);
                break;
        }

        return $model;
    }

}