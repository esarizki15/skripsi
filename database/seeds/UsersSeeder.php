<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Jabatan;
use App\Role;
use App\RoleUser;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = Jabatan::create([
            'nama'=>'Direktur'
        ]);

        $jabatan1 = Jabatan::create([
            'nama'=>'Manager'
        ]);

        $jabatan2 = Jabatan::create([
            'nama'=>'Supervisor'
        ]);

        $jabatan3 = Jabatan::create([
            'nama'=>'Staff'
        ]);

        $jabatan4 = Jabatan::create([
            'nama'=>'Karyawan'
        ]);

        $role1 = Role::create([
            'nama'=>'Admin'
        ]);
        $role2 = Role::create([
            'nama'=>'Pimpinan 5R'
        ]);
        $role3 = Role::create([
            'nama'=>'Pengawas 5R'
        ]);
        $role4 = Role::create([
            'nama'=>'Petugas 5R'
        ]);
        $role5 = Role::create([
            'nama'=>'Karyawan'
        ]);


        $user = new User();
        $user->name = 'Admin Larapus';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('rahasia');
        $user->jabatan_id = $jabatan3->id;
        $user->save();

        $user1 = new User();
        $user1->name = 'Esa';
        $user1->email = 'esa@gmail.com';
        $user1->password = bcrypt('rahasia');
        $user1->jabatan_id = $jabatan4->id;
        $user1->save();

        $user2 = new User();
        $user2->name = 'Rizki';
        $user2->email = 'rizki@gmail.com';
        $user2->password = bcrypt('rahasia');
        $user2->jabatan_id = $jabatan1->id;
        $user2->save();

        $roleuser = RoleUser::create([
            'user_id'=>$user->id,
            'role_id'=>$role1->id
        ]);

        $roleuser = RoleUser::create([
            'user_id'=>$user1->id,
            'role_id'=>$role2->id
        ]);

        $roleuser = RoleUser::create([
            'user_id'=>$user1->id,
            'role_id'=>$role3->id
        ]);
    }
}
