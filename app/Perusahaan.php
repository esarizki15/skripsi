<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Perusahaan extends Model
{
	protected $fillable = ['nama', 'provinsi', 'kota', 'kecamatan', 'detail'];
    public function areas()
    {
        return $this->hasMany('App\Area');
    }

    public function tempats()
    {
        return $this->hasMany('App\Tempat');
    }

    public static function boot()
	{
		parent::boot();

		self::deleting(function($perusahaan) {
			// mengecek apakah penulis masih punya buku
			if ($perusahaan->tempats->count() > 0) {
				// menyiapkan pesan error
				$html = 'Detail Perusahaan tidak bisa dihapus karena masih memiliki tempat';
				$html .= '<ul>';
				foreach ($perusahaan->tempats as $tempat) {
					$html .= "<li>$tempat->nama</li>";
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
}
