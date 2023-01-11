<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Permission';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** Role permission */
        Permission::create(['name' => 'get roles']);
        Permission::create(['name' => 'store new role']);
        Permission::create(['name' => 'role get permission']);
        Permission::create(['name' => 'role update permission']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'get permissions']);
    }
}
