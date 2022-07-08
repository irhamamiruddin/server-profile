<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateDefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'server-list',
            'server-show',
            'application-list',
            'application-show',
            'documentation-list',
            'documentation-show',
            'activity-list',
            'activity-show',
        ];

        $role = Role::create(['name' => 'Staff']);

        $query_permissions = Permission::whereIn('name',$permissions)->get();

        $role->syncPermissions($query_permissions);
    }
}
