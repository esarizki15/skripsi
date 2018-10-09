<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NotificationChannels\WebPush\HasPushSubscriptions;
class User extends Authenticatable
{
    use HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hp', 'jabatan_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengaduans()
    {
        return $this->hasMany('App\Pengaduan');
    }

    public function penanganans()
    {
        return $this->hasMany('App\Penanganan');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'jabatan_id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
