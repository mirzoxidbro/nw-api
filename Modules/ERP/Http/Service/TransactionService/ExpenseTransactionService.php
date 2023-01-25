<?php

namespace Modules\ERP\Http\Service\TransactionService;

use App\Models\User;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Entities\Workman;

class ExpenseTransactionService 
{

    public static function ExpenseTransaction($request, $purpose)
    {
        $model = new Transaction();
        $model->amount = $request->amount;
        $model->description = $request->description;
        $payer = User::find($request->receiver_id);
        switch ($purpose) {
            case 'lending':
                $receiver = Workman::find($request->receiver_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                break;
            case 'debt collection':
                $receiver = Workman::find($request->payer_id);
                $model->payer()->associate($payer);
                $model->receiver()->associate($receiver);
                $model->purpose()->associate($purpose);
                break;
            default:
                $model->payer()->associate($payer);
                $model->purpose()->associate($purpose);
                break;
        }

        $model->save();
        return $model;
    }

}