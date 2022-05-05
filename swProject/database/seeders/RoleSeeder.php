<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// link to role model
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin user
        $role_admin= new Role();
        $role_admin->name= 'admin';
        $role_admin->description= 'A user with administrator permissions';

        $role_admin->save();

        // default user
        $role_user= new Role();
        $role_user->name= 'user';
        $role_user->description= 'A default user';

        $role_user->save();
    }
}
