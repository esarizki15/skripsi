<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [ 'user_id', 'lokasi_id', 'pengaduan', 'foto', 'keamanan', 'kerugian', 'deskripsi'];

    public function users()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	
	public function lokasis()
	{
		return $this->belongsTo('App\Lokasi', 'lokasi_id');
	}

	public function penanganans()
	{
		return $this->hasOne('App\Penanganan');
	}

	public function keywords()
	{
		return $this->belongsToMany('App\Keyword');
	}

}
