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
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('user1234');
        $user->profile_picture = 'admin.jpg';
        $user->save();
        $user->roles()->attach(1);

        $user = new \App\User();
        $user->name = 'mod';
        $user->email = 'mod@example.com';
        $user->password = bcrypt('user1234');
        $user->profile_picture = 'mod.jpg';
        $user->save();
        $user->roles()->attach(2);

        $user = new \App\User();
        $user->name = 'user';
        $user->email = 'user@example.com';
        $user->password = bcrypt('user1234');
        $user->profile_picture = 'user.jpg';
        $user->save();
        $user->roles()->attach(3);
    }
}
