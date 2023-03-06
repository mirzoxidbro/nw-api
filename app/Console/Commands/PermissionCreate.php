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

        /**Attendance permission */
        Permission::create(['name' => 'get attendance']);
        Permission::create(['name' => 'create attendance']);
        Permission::create(['name' => 'show attendance']);
        Permission::create(['name' => 'update attendance']);
        Permission::create(['name' => 'delete attendance']);

        /**Debt history */
        Permission::create(['name' => 'get debt history']); //qarzdorliklarni ko'rish

        /**Wallet permisison */
        Permission::create(['name' => 'get wallet']); //kuryerlarni xamyonidagi summani ko'rish

        /**Order permission */
        Permission::create(['name' => 'get orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'update orders']);
        Permission::create(['name' => 'delete orders']);

        /**Order item permission */
        Permission::create(['name' => 'get order items']);
        Permission::create(['name' => 'create order items']);
        Permission::create(['name' => 'show order items']);
        Permission::create(['name' => 'update order items']);
        Permission::create(['name' => 'delete order items']);

        /**Transaction permission */
        Permission::create(['name' => 'get transactions']);
        Permission::create(['name' => 'create transaction']);

        /**Transaction purpose permission */
        Permission::create(['name' => 'get transaction purposes']);
        Permission::create(['name' => 'create transaction purposes']);
        Permission::create(['name' => 'show transaction purposes']);
        Permission::create(['name' => 'update transaction purposes']);
        Permission::create(['name' => 'delete transaction purposes']);
        
    }
}
