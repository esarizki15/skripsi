<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
	protected $fillable = ['area_id', 'nama', 'detail'];
	
    public function areas()
	{
		return $this->belongsTo('App\Area', 'area_id');
	}

	public function pengaduans()
	{
		return $this->hasMany('App\Pengaduan');
	}

	
}
