<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $fillable = ['perusahaan_id', 'nama'];
    public function lokasis()
    {
        return $this->hasMany('App\Lokasi');
    }

    public function perusahaans()
	{
		return $this->belongsTo('App\Perusahaan', 'perusahaan_id');
	}
}
