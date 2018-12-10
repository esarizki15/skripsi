<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duplikat extends Model
{
	protected $fillable = ['nama'];

    public function pengaduans()
	{
		return $this->belongsToMany('App\Pengaduan');
	}
}
