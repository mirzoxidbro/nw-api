<?php

namespace Modules\ERP\Service\Transaction;

use Modules\Core\Service\BaseService;
use Modules\ERP\Entities\Transaction;
use Modules\ERP\Entities\TransactionPurpose;
use Modules\ERP\Repository\TransactionRepository;
use Modules\ERP\Transformers\Transaction\TransactionResource;

class TransactionService extends BaseService
{
    protected array $filter_fields;
    protected $sort_fields;

    public function __construct(TransactionRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'purpose_type' => ['type' => 'string'],
            'purpose_title' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'payer' => ['type' => 'string'],
            'receiver' => ['type' => 'string']
        ];
    }

    public function getTransactions(array $params)
    {
        $query = Transaction::orderByDesc('id');
        $query = TransactionResource::collection($query->with('payer', 'receiver', 'purpose:id,type,title')->paginate(10));
        $query = $this->filter($query, $this->filter_fields, $params);
        return $query;
    }

    public function create($params)
    {
        $purpose = TransactionPurpose::findOrFail($params['purpose_id']);
        
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