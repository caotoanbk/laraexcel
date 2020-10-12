<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_viewer = new Role();
        $role_viewer->name = 'viewer';
        $role_viewer->description = 'A Viewer User';
        $role_viewer->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'A admin user';
        $role_admin->save();
    }
}
