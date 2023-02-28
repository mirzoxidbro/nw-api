<?php

namespace Modules\ERP\Service;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\DB;
use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\PaymentPurpose;
use Modules\ERP\Events\TransactionEvent;
use Modules\ERP\Http\Trait\TransactionExpense;
use Modules\ERP\Http\Trait\TransactionIncome;
use Modules\ERP\Http\Trait\TransactionTransfer;
use Modules\ERP\Repository\TransactionRepository;

class TransactionService extends BaseService
{
    use TransactionIncome, TransactionExpense, TransactionTransfer;

    public function __construct(TransactionRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create($params)
    {
        $purpose = PaymentPurpose::findOrFail($params->purpose_id);
        
            switch ($purpose->type) {
                case 'income':
                    return $this->TransactionIncome($params, $purpose);
                    break;
    
                case 'expense':
                    return $this->TransactionExpense($params, $purpose);
                    break;
    
                case 'transfer':
                    return $this->TransactionTransfer($params, $purpose);
                    break;
    
                default:
                
                    break;
            }
    }
}