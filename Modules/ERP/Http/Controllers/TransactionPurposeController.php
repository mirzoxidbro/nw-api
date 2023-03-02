<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\ERP\Entities\TransactionPurpose;
use Modules\ERP\Http\Requests\PaymentPurpose\PaymentPurposeRequest;

class TransactionPurposeController extends Controller
{
    public function index()
    {
        $income = TransactionPurpose::query()->select('id', 'type', 'title')->where('type', 'income')->get();
        $expense = TransactionPurpose::query()->select('id', 'type', 'title')->where('type', 'expense')->get();
        $transfer = TransactionPurpose::query()->select('id', 'type', 'title')->where('type', 'transfer')->get();
        return response()->json([
            'income' => $income,
            'expense' => $expense,
            'transfer' => $transfer
        ]);
    }

    public function store(PaymentPurposeRequest $request)
    {
        return TransactionPurpose::create($request->validated());
    }

    public function update(PaymentPurposeRequest $request, $id)
    {
        $purpose = TransactionPurpose::findOrFail($id);
        if ($purpose->canBeChanged == 0) {
            return response()->json(['message' => 'Cannot be changed']);
        } else {
            $purpose->type = $request->type;
            $purpose->title = $request->title;
            $purpose->save();
            return response()->json(['data' => $purpose]);
        }
    }

    public function delete($id)
    {
        $purpose = TransactionPurpose::findOrFail($id);
        if ($purpose->canBeChanged == true) {
            $purpose->delete();
            return response()->json([
                'message' => 'deleted successfully'
            ]);
        }
        return response()->json([
            'message' => 'cannot be deleted'
        ]);
    }
}
