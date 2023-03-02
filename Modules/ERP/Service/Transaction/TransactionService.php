<?php

namespace Modules\ERP\Service\Transaction;

use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\TransactionPurpose;
use Modules\ERP\Repository\TransactionRepository;

class TransactionService extends BaseService
{

    public function __construct(TransactionRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create($params)
    {
        $purpose = TransactionPurpose::findOrFail($params->purpose_id);
        
            switch ($purpose->type) {
                case 'income':
                    return IncomeTransactionService::IncomeTransaction($params, $purpose);
                    break;
    
                case 'expense':
                    return ExpenseTransactionService::ExpenseTransaction($params, $purpose);
                    break;
    
                case 'transfer':
                    return TransferTransactionService::TransferTransaction($params, $purpose);
                    break;
    
                default:
                
                    break;
            }
    }
}