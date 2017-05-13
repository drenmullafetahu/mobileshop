<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'role_id'     => '1',
            'name'     => 'Funda',
            'last_name'     => 'Gashi',
            'email'    => 'funda.gash@gmail.com',
            'password' => Hash::make('12345'),

        ));
        User::create(array(
            'role_id'     => '1',
            'name'     => 'Sara',
            'last_name'     => 'Perolli',
            'email'    => 'saraperolli@gmail.com',
            'password' => Hash::make('123456'),

        ));

    }
}


