<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyelesaian extends Model
{
    protected $fillable = ['pengajuan_id', 'status', 'keterangan'];

    public function pengajuans()
	{
		return $this->belongsTo('App\Pengajuan', 'pengajuan_id');
	}
}
