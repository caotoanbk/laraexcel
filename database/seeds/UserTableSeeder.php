<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_viewer = Role::where('name', 'viewer')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $viewer = new User();
        $viewer->name = 'Viewer Name';
        $viewer->email = 'viewer@example.com';
        $viewer->password = bcrypt('secret');
        $viewer->save();
        $viewer->roles()->attach($role_viewer);

        $admin = new User();
        $admin->name = 'Admin name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
