<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{

	protected $fillable = ['nama'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
