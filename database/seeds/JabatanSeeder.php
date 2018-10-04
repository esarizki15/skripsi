<?php

use Illuminate\Database\Seeder;
use App\Jabatan;
class JabatanSeeder extends Seeder
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

        $jabatan = Jabatan::create([
            'nama'=>'Karyawan'
        ]);
    }
}
