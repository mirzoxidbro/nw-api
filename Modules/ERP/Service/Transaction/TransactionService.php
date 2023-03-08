<?php

namespace Modules\ERP\Service\Transaction;

use Illuminate\Support\Facades\DB;
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

    public function dailystatistics()
    {
        return DB::table('transactions')
            ->join('transaction_purposes', 'transactions.purpose_id', '=', 'transaction_purposes.id')
            ->select('transaction_purposes.type', 'transaction_purposes.title', DB::raw('SUM(transactions.amount) as total_amount'), DB::raw('DATE(transactions.created_at) as date'))
            ->groupBy('transaction_purposes.type', 'transaction_purposes.title', 'date')
            ->orderBy('date')
            ->get();
    }

    public function monthtlyStatistics()
    {
        return DB::table('transactions')
        ->join('transaction_purposes', 'transactions.purpose_id', '=', 'transaction_purposes.id')
        ->select('transaction_purposes.type', 'transaction_purposes.title', DB::raw('SUM(transactions.amount) as total_amount'), DB::raw('DATE_FORMAT(transactions.created_at, "%Y-%m") as monthly'))
        ->groupBy('transaction_purposes.type', 'transaction_purposes.title', 'monthly')
        ->orderBy('monthly')
        ->get();
    }

    public function yearlyStatistics()
    {
        return DB::table('transactions')
        ->join('transaction_purposes', 'transactions.purpose_id', '=', 'transaction_purposes.id')
        ->select('transaction_purposes.type', 'transaction_purposes.title', DB::raw('SUM(transactions.amount) as total_amount'), DB::raw('YEAR(transactions.created_at) as year'))
        ->groupBy('transaction_purposes.type', 'transaction_purposes.title', 'year')
        ->orderBy('year')
        ->get();
    }
}
