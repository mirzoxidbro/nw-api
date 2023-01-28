<?php

namespace Modules\ERP\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DebtHistoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $payer_id;
    private $amount;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payer_id, $amount)
    {
        $this->payer_id = $payer_id;
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->payer_id, $this->amount);
    }
}
