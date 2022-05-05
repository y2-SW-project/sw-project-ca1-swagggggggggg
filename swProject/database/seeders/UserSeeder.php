<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// hash
use Hash;
// link to user AND role model, role model FIRST
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fetches roles
        $role_admin= Role::where('name', 'admin')->first();
        $role_user= Role::where('name', 'user')->first();

        $admin= new User();
        $admin->name= 'admin1';
        $admin->email= 'adminexample@gmail.com';
        $admin->password= Hash::make('password');
        
        $admin->save();
        // attaches admin role from line 17
        $admin->roles()->attach($role_admin);

        $user= new User();
        $user->name= 'user1';
        $user->email= 'userexample@gmail.com';
        $user->password= Hash::make('password');
        
        $user->save();
        // attaches user role from line 18
        $user->roles()->attach($role_user);
    }
}
