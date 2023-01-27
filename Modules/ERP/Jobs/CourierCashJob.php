<?php

namespace Modules\ERP\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
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
        $courier_id = User::find($this->model->receiver_id)->id;
        $wallet = Wallet::query()->where('user_id', $courier_id)->first();
        $wallet->amount = $this->model->amount + $wallet->amount;
        $wallet->save();
    }
}
