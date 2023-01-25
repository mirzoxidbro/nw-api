<?php

namespace Modules\ERP\Http\Service\TransactionService;

use Modules\ERP\Entities\PaymentPurpose;

class BaseTransactionService
{
    public function BaseTransactionService($request)
    {
        $purpose = PaymentPurpose::findOrFail($request->purpose_id);
        if($purpose){
            switch ($purpose->type) {
                case 'income':
                    return IncomeTransactionService::IncomeTransaction($request, $purpose);
                    break;
    
                case 'expense':
                    return ExpenseTransactionService::ExpenseTransaction($request, $purpose);
                    break;
    
                case 'transfer':
                    return TransferTransactionService::TransferTransaction($request, $purpose);
                    break;
    
                default:
                    return "";
                    break;
            }
        }else{
            return response()->json([
                'message' => "error" // error bilan ishlash
            ]);
        }
    }
}