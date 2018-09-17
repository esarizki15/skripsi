<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    protected $fillable = ['user_id', 'pengaduan_id'];

    public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function pengaduans()
	{
		return $this->belongsTo('App\Pengaduan', 'pengaduan_id');
	}

	public function pengajuans()
	{
		return $this->hasMany('App\Pengajuan');
	}
}
