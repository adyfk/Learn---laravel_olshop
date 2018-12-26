<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        // Membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
        // Membuat sample admin

        $admin = new User();
        $admin->name = "Admin";
        $admin->no_hp = '00000000';
        $admin->j_k = 'L';
        $admin->email = 'x@x.x';
        $admin->password = Hash::make('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        $admin = new User();
        $admin->name = "Adi Fatkhurozi";
        $admin->no_hp = '082136950725';
        $admin->j_k = 'L';
        $admin->email = 'ady.fatkhurozi@gmail.com';
        $admin->password = Hash::make('rahasia');
        $admin->save();
        $admin->attachRole($memberRole);
    }
}
