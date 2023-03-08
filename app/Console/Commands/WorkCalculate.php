<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\ERP\Entities\DailyWorkVolume;
use Modules\ERP\Entities\OrderItem;

class WorkCalculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $value = OrderItem::where('status', 'washed')
        ->whereDate('updated_at', Carbon::today())
        ->sum('surface');

        $volume = new DailyWorkVolume();
        $volume->work_volume = $value;
        $volume->save();

    }
}
