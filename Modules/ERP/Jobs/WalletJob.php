<?php

namespace Modules\ERP\Jobs;

use Illuminate\Bus\Queueable;
use Modules\ERP\Entities\Wallet;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\ERP\Entities\PaymentPurpose;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class WalletJob implements ShouldQueue
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
        $purpose = PaymentPurpose::where('id', $this->model->purpose_id)->first();
        $amount = $this->model->amount;

        if ($purpose->type == 'transfer') {
            Wallet::where('user_id', $this->model->receiver_id)->increment('amount', $amount);
            Wallet::where('user_id', $this->model->payer_id)->decrement('amount', $amount);
        } elseif ($purpose->type == 'income') {
            Wallet::where('user_id', $this->model->receiver_id)->increment('amount', $amount);
        } else {
            Wallet::where('user_id', $this->model->payer_id)->decrement('amount', $amount);
        }
    }
}
