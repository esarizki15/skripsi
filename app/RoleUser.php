<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $fillable = ['user_id', 'role_id', 'tempat_id'];
    public function tempats()
    {
    	return $this->belongsTo('App\Tempat', 'tempat_id');
    }
}
