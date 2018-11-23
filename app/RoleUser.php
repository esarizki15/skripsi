<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $fillable = ['user_id', 'role_id', 'tempat_id'];
    protected $table = 'role_user';
    public function tempats()
    {
    	return $this->belongsTo('App\Tempat', 'tempat_id');
    }
    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function roles()
    {
    	return $this->belongsTo('App\Role', 'role_id');
    }
}
