<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'Admin User')->first();

        if(!$user){
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'user_login_type' => 'local',
                'password' => bcrypt('admin1999')
            ]);
        }

        $role = Role::firstOrCreate(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        // $user->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
