<?php

use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User();
        $admin->name = "Admin";
        $admin->email = "admin@code4.ro";
        $admin->password = Hash::make("uber1W3b@rm1n#uber");
        $admin->save();
    }
}
