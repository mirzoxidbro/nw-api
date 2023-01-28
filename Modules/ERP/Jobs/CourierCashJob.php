<?php

namespace Modules\ERP\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\ERP\Entities\PaymentPurpose;
use Modules\ERP\Entities\Wallet;

class CourierCashJob implements ShouldQueue
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

        // switch ($purpose->type) {
        //     case 'transer':
        //         Wallet::where('user_id', $this->model->receiver_id)->increment('amount', $amount);
        //         Wallet::where('user_id', $this->model->payer_id)->decrement('amount', $amount);
        //         break;
        //     case 'income':
        //         Wallet::where('user_id', $this->model->receiver_id)->increment('amount', $amount);
        //         break;
        //     default:
        //         Wallet::where('user_id', $this->model->receiver_id)->decrement('amount', $amount);
        //         break;
        // }

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
