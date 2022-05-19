<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // roles must be called first so there are roles to assign when the users are created
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
