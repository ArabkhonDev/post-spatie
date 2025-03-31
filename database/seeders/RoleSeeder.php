<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create(["name"=> "admin"]);
        $writerRole = Role::create(["name"=> "writer"]);

        $editPer = Permission::create(["name"=> "edit"]);
        $deletePer = Permission::create(["name"=> "delete"]);
        $createPer = Permission::create(["name"=> "create"]);
        $mngPer = Permission::create(["name"=> "manage"]);

        $adminRole->givePermissionTo([$editPer, $deletePer, $createPer, $mngPer]);
        $writerRole->givePermissionTo([$editPer, $createPer]);

        $admin = User::find(1);
        $admin->assignRole($adminRole);


        $writer1 = User::find(2);
        $writer1->assignRole($writerRole);

        $writer2 = User::find(3);
        $writer2->assignRole($writerRole);
    }
}
