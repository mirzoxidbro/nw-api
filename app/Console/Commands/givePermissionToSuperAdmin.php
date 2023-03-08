<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class givePermissionToSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'give:permission';

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
        $user = User::create([
            "first_name" => "superadmin",
            "last_name" => "superadmin",
            "username" => "superadmin",
            "password" => Hash::make("verysecret"),
            "position" => "user",
            "phone" => 998997256657,
            "birthday" => "2001-03-22",
            "gender" => 1
        ]);

        $role = Role::create(['name' => 'superadmin', 'guard_name' => 'web']);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        $user->assignRole($role);
    }
}
