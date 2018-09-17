<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
	protected $fillable = ['nama', 'provinsi', 'kota', 'kecamatan', 'detail'];
    public function areas()
    {
        return $this->hasMany('App\Area');
    }
}
