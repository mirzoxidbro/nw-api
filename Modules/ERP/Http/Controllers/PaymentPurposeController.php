<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\PaymentPurpose;
use Modules\ERP\Http\Requests\PaymentPurpose\PaymentPurposeRequest;

class PaymentPurposeController extends Controller
{
    public function index()
    {
        $income = PaymentPurpose::query()->select('id', 'type')->where('type', 'income')->get();
        $expense = PaymentPurpose::query()->select('id', 'type')->where('type', 'expense')->get();
        return response()->json([
            'income' => $income,
            'expense' => $expense,
        ]);
    }

    public function store(PaymentPurposeRequest $request)
    {
        return PaymentPurpose::create($request->validated());
    }

    public function update(PaymentPurposeRequest $request, $id)
    {
        $purpose = PaymentPurpose::findOrFail($id);
        if($purpose->canBeChanged == 0)
        {
            return response()->json(['message' => 'Cannot be changed']);
        }else{
            $purpose->type = $request->type;
            $purpose->title = $request->title;
            $purpose->save();
            return response()->json(['data' => $purpose]);
        }

    }

    public function delete($id)
    {
        $purpose = PaymentPurpose::findOrFail($id);
        if($purpose->canBeChanged == true)
        {
            $purpose->delete();
            return response()->json([
                'message' => 'deleted successfully'
            ]);
        }else{
            return response()->json([
                'message' => 'cannot be deleted'
            ]);
        }
    }
}
