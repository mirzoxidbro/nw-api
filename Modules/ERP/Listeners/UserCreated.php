<?php

namespace Modules\ERP\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\ERP\Entities\DebtHistory;
use Modules\ERP\Entities\Wallet;
use Modules\ERP\Events\UserCreated as EventsUserCreated;

class UserCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventsUserCreated $param)
    {
        $wallet = new Wallet();
        $wallet->user_id = $param->user_id;
        $wallet->amount = 0;
        $wallet->save();
        $debthistory = new DebtHistory();
        $debthistory->user_id = $param->user_id;
        $debthistory->save();
    }
}
