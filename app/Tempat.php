<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
	protected $fillable = [
		'tempat_id',
		'nama',
		'perusahaan_id'
	];

	public function parent()
	{
		return $this->belongsTo(Tempat::class, 'tempat_id');
	}

	public function child()
	{
		return $this->hasMany(Tempat::class);
	}

	public function perusahaan()
	{
		return $this->belongsTo('App\Perusahaan', 'perusahaan_id');
	}
}
