<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
             'name' => 'Shahzaib khan',
             'email' => 'szafridi121@gmail.com',
             'password' => bcrypt('password'),
             'admin'  => 1

        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads/avatar/1.png',
            'about'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
