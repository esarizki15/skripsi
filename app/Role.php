<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
protected $fillable = ['nama'];
    
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

	public function tempats()
    {
    	return $this->belongsToMany('App\Tempat');
    }    
}
