<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin Larapus';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('rahasia');
        $user->save();

        $user1 = new User();
        $user1->name = 'Esa';
        $user1->email = 'esa@gmail.com';
        $user1->password = bcrypt('rahasia');
        $user1->save();

        $user2 = new User();
        $user2->name = 'Rizki';
        $user2->email = 'rizki@gmail.com';
        $user2->password = bcrypt('rahasia');
        $user2->save();
    }
}
