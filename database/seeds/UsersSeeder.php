<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Jabatan;
use App\Role;
use App\RoleUser;
use App\Perusahaan;
use App\Tempat;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = Perusahaan::create([
            'nama'=>'PT. Bimasakti Karyaprima TNG',
            'provinsi'=>'Banten',
            'kota'=>'Tangerang',
            'kecamatan'=>'Jatake',
            'detail'=>'Jl Raya Industri I Kawasan Industri Jatake Bl D/8-A'
        ]);
        $area = Tempat::create([
            'nama'=>'Kantor',
            'perusahaan_id'=>$perusahaan->id
        ]);

        $lokasi = Tempat::create([
            'nama'=>'Kantor A',
            'tempat_id'=>$area->id
        ]);

        $area1 = Tempat::create([
            'nama'=>'Gudang',
            'perusahaan_id'=>$perusahaan->id
        ]);

        $lokasi1 = Tempat::create([
            'nama'=>'Gudang A',
            'tempat_id'=>$area1->id
        ]);
/*
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
*/
        $role1 = Role::create([
            'nama'=>'Admin'
        ]);
        $role2 = Role::create([
            'nama'=>'Pimpinan 5R'
        ]);
        $role3 = Role::create([
            'nama'=>'Pengawas 5R'
        ]);
        // $role3->tempats()->attach(Tempat::find(rand(1,2)));
        // $role3->tempats()->attach(Tempat::find(rand(3,4)));

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
        $user->jabatan = 'Direktur';
        $user->save();

        $user->tempats()->attach(Tempat::find(rand(1,2)));

        $user1 = new User();
        $user1->name = 'Esa';
        $user1->email = 'esa@gmail.com';
        $user1->password = bcrypt('rahasia');
        $user1->jabatan = 'Manager' ;
        $user1->save();
        $user1->tempats()->attach(Tempat::find(rand(1,2)));
        $user1->tempats()->attach(Tempat::find(rand(3,4)));

        $user2 = new User();
        $user2->name = 'Rizki';
        $user2->email = 'rizki@gmail.com';
        $user2->password = bcrypt('rahasia');
        $user2->jabatan = 'Karyawan' ;
        $user2->save();
        $user2->tempats()->attach(Tempat::find(rand(1,2)));
        $user2->tempats()->attach(Tempat::find(rand(3,4)));

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

        $roleuser = RoleUser::create([
            'user_id'=>$user2->id,
            'role_id'=>$role5->id
        ]);
    }
}
