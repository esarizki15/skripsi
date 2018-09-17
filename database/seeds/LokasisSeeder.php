<?php

use Illuminate\Database\Seeder;
use App\Perusahaan;
use App\Area;
use App\Lokasi;
class LokasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sample Perusahaan
        $perusahaan = Perusahaan::create(['nama'=>'PT. Bimasakti Karyaprima TNG', 'provinsi'=>'Banten', 'kota'=>'Tangerang', 'kecamatan'=>'Jatake', 'detail'=>'Jl Raya Industri I Kawasan Industri Jatake Bl D/8-A']);
        //sample Area
        $area = Area::create(['perusahaan_id'=>$perusahaan->id, 'nama'=>'Kantor']);
        //sample Lokasi
        $lokasi = Lokasi::create(['area_id'=>$area->id, 'nama'=>'Ruang Meeting', 'detail'=>'Tempat Meeting']);
        
    }
}
