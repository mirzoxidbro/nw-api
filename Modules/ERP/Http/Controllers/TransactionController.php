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

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $user = User::find($request->payer_id);
        $purpose = PaymentPurpose::find($request->purpose_id);
        $model = new Transaction();
        $model->amount = $request->amount;
        $model->description = $request->description;
        if($request->type == 'expense'){
            $worker = Workman::find($request->receiver_id);
            $model->payer()->associate($user);
            $model->receiver()->associate($worker);
            $model->purpose()->associate($purpose);
            $model->save();
        }else{
            $order = Order::find($request->payer_id);
            $model->receiver()->associate($user);
            $model->payer()->associate($order);
            $model->purpose()->associate($purpose);
            $model->save();
            
        }
        return $model;
    }
}
