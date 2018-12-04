<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Tempat extends Model
{
	protected $fillable = [
		'tempat_id',
		'nama',
		'perusahaan_id'
	];

	public function parent()
	{
		return $this->belongsTo(Tempat::class, 'tempat_id');
	}

	public function child()
	{
		return $this->hasMany(Tempat::class);
	}

	public function perusahaan()
	{
		return $this->belongsTo('App\Perusahaan', 'perusahaan_id');
	}
	
	public function pengaduans()
	{
		return $this->hasMany('App\Pengaduan');
	}

	public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public static function boot()
	{
		parent::boot();

		self::deleting(function($tempat) {
			// mengecek apakah penulis masih punya buku
			if ($tempat->child->count() > 0) {
				// menyiapkan pesan error
				$html = 'Data area yang anda pilih tidak bisa dihapus karena masih memiliki lokasi';
				$html .= '<ul>';
				foreach ($tempat->child as $child) {
					$html .= "<li>$child->nama</li>";
				}
				$html .= '</ul>';
				
				Session::flash("flash_notification", [
					"level"=>"danger",
					"message"=>$html
				]);

				// membatalkan proses penghapusan
				return false;
				}
			});
	}

	public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
