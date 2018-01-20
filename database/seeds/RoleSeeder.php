<?php

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;
use App\Models\User;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin1')
        ]);

        $admin = User::where('email', 'admin@admin.com')->first();

        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        $admin->attachRole($adminRole);

    }
}
