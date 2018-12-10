<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NotificationChannels\WebPush\HasPushSubscriptions;
class User extends Authenticatable
{
    use Notifiable, HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hp', 'jabatan'
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

    public function formattedRoles($space = true)
    {
        $batas = $this->roles->count();
        $status = 0;
        $str = '';

        if ($space) {
            foreach ($this->roles as $role) {
                $status++;
                $str = $str . $role->nama;
                if ($batas != $status) {
                    $str = $str . ", ";
                }
            }
        } else {
            foreach ($this->roles as $role) {
                $status++;
                $str = $str . $role->nama;
                if ($batas != $status) {
                    $str = $str . ",";
                }
            }
        }
        return $str;
    }

    public function formattedTempats()
    {
        $batas = $this->tempats->count();
        $status = 0;
        $str = '';
        foreach ($this->tempats as $tempat) {
            $status++;
            $str = $str . $tempat->nama;
            if ($batas != $status) {
                $str = $str . ", ";
            }
        }

        if ($str == '') {
            return 'Bukan Penganggung Jawab';
        }
        return $str;
    }

    public function tempats()
    {
        return $this->belongsToMany('App\Tempat');
    }
}
