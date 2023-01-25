<?php

namespace Modules\ERP\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\Order;
use Modules\ERP\Entities\PaymentPurpose;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Entities\Workman;
use Modules\ERP\Http\Service\TransactionService\BaseTransactionService;

class TransactionController extends Controller
{
    // public function income(Request $request)
    // {
    //     $model = new Transaction();
    //     $model->amount = $request->amount;
    //     $model->description = $request->description;
    //     $receiver = User::find($request->receiver_id);
    //     $purpose = PaymentPurpose::find($request->purpose_id);

    //     switch ($purpose->title) {
    //         case 'from the order':
    //             $payer = Order::find($request->payer_id);
    //             $model->payer()->associate($payer);
    //             $model->receiver()->associate($receiver);
    //             $model->purpose()->associate($purpose);
    //             break;
    //         case 'debt collection':
    //             $payer = Workman::find($request->payer_id);
    //             $model->payer()->associate($payer);
    //             $model->receiver()->associate($receiver);
    //             $model->purpose()->associate($purpose);
    //             break;
    //         default:
    //             $model->receiver()->associate($receiver);
    //             $model->purpose()->associate($purpose);
    //             break;
    //     }

    //     $model->save();
    //     return $model;
    // }

    // public function expense(Request $request)
    // {
    //     $model = new Transaction();
    //     $model->amount = $request->amount;
    //     $model->description = $request->description;
    //     $payer = User::find($request->receiver_id);
    //     $purpose = PaymentPurpose::find($request->purpose_id);
    //     switch ($purpose) {
    //         case 'lending':
    //             $receiver = Workman::find($request->receiver_id);
    //             $model->payer()->associate($payer);
    //             $model->receiver()->associate($receiver);
    //             $model->purpose()->associate($purpose);
    //             break;
    //         case 'debt collection':
    //             $receiver = Workman::find($request->payer_id);
    //             $model->payer()->associate($payer);
    //             $model->receiver()->associate($receiver);
    //             $model->purpose()->associate($purpose);
    //             break;
    //         default:
    //             $model->payer()->associate($payer);
    //             $model->purpose()->associate($purpose);
    //             break;
    //     }

    //     $model->save();
    //     return $model;
    // }

    // public function transfer(Request $request)
    // {
    //     $model = new Transaction();
    //     $receiver = User::findOrFail($request->receiver_id);
    //     $payer = User::findOrFail($request->payer_id);
    //     $purpose = PaymentPurpose::findOrFail($request->purpose_id);
    //     $model->amount = $request->amount;
    //     $model->description = $request->description;
    //     $model->payer()->associate($payer);
    //     $model->receiver()->associate($receiver);
    //     $model->purpose()->associate($purpose);
    //     $model->save();
    // }

    public function transaction(BaseTransactionService $service, Request $request)
    {
        return $service->BaseTransactionService($request);
    }
}
