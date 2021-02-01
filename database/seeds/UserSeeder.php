<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name' => 'admin', 'email' => 'admin@admin.com', 'number' => '08977931210', 'password' => bcrypt('admin@admin.com'), 'role' => 'admin', 'register_status' => '1'];
        User::insert($data);
        $data = ['name' => 'admin', 'email' => 'user@user.com','number' => '08977931290', 'password' => bcrypt('user@user.com'), 'role' => 'customer', 'register_status' => '1'];
        User::insert($data);
    }
}
