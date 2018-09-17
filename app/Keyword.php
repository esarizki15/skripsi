<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

	protected $fillable = ['kunci'];

    public function pengaduans()
	{
		return $this->belongsToMany('App\Pengaduan');
	}
}
