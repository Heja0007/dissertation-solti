<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate(
            [
                'name' => 'Admin',
                'email' => 'super.admin@trekking.com',
                'password' => bcrypt('123456789'),
            ]
        );
    }
}
