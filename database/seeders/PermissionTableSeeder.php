<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
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
            'server-create',
            'server-edit',
            'server-delete',
            'application-list',
            'application-show',
            'application-create',
            'application-edit',
            'application-delete',
            'documentation-list',
            'documentation-show',
            'documentation-create',
            'documentation-edit',
            'documentation-delete',
            'activity-list',
            'activity-show',
            'activity-create',
            'activity-edit',
            'activity-delete',
            'user-list',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',
         ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
