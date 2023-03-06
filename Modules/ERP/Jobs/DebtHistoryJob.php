<?php

namespace Modules\ERP\Jobs;

use Illuminate\Bus\Queueable;
use Modules\ERP\Entities\DebtHistory;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\ERP\Entities\TransactionPurpose;

class DebtHistoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $model;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $purpose = TransactionPurpose::query()->where('id', $this->model->purpose_id)->first();
        $transaction_id = $this->model->id;
        if ($purpose->title == 'lending') {
            $workman_id = $this->model->receiver_id;
            $debt_history = DebtHistory::query()->where('workman_id', $workman_id)->latest()->first();
            DebtHistory::create([
                'workman_id' => $workman_id,
                'transaction_id' => $transaction_id,
                'amount' => $debt_history->amount + $this->model->amount,
                'description' => $this->model->description
            ]);
        } elseif ($purpose->title == 'debt collection') {
            $workman_id = $this->model->payer_id;
            $debt_history = DebtHistory::query()->where('workman_id', $workman_id)->latest()->first();
            DebtHistory::create([
                'workman_id' => $workman_id,
                'transaction_id' => $transaction_id,
                'amount' => $debt_history->amount - $this->model->amount,
                'description' => $this->model->description
            ]);
        }
    }
}
