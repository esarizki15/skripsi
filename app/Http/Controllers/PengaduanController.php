<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Keyword;
use App\Lokasi;
use App\Tempat;
use App\Duplikat;
use App\Penanganan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pengaduan = Pengaduan::all();
        $duplikats = Duplikat::all();
        return view('pengaduan.index')->with(compact('pengaduan', 'duplikats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (isset($request->lokasi)) {
            $lokasi = Tempat::find($request->lokasi);            
            return view('pengaduan.create', compact('lokasi'));
        }
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lokasi' => 'required',
            'pengaduan' => 'required',
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);

        $pengaduan = Pengaduan::create(array_merge($request->except('foto'), [
            'user_id' => Auth::id(),
            'lokasi_id' => $request->lokasi,
            'pengaduan' => $request->pengaduan,
            'foto' => $request->foto,
            'deskripsi' => $request->deskripsi
        ])) ;

           /* $str = (string)$request->deskripsi;
            $low = strtolower($str);
            $exp = explode(" ", $low);
            for ($i=0; $i < count($exp) ; $i++) { 
                // jika ada keyword yang dimasukan attach pengaduan
                // jiak tidak ada, simpan keyword lalu atach pengaduan
                if (Keyword::where('kunci', $exp[$i])->first() == null) {  
                    $keyword = Keyword::create([
                        'kunci'=>$exp[$i]
                    ]);
                    $keyword->pengaduans()->attach($pengaduan);
                }else{
                Keyword::where('kunci', $exp[$i])->first()->pengaduans()->attach($pengaduan);
                
                }
            }
    */
            // isi field cover jika ada cover yang diupload
            if ($request->hasFile('foto')) {

            // Mengambil file yang diupload
                $uploaded_foto = $request->file('foto');

            // mengambil extension file
                $extension = $uploaded_foto->getClientOriginalExtension();

            // membuat nama file random berikut extension
                $filename = md5(time()) . '.' . $extension;

            // menyimpan cover ke folder public/img
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $uploaded_foto->move($destinationPath, $filename);
            // mengisi field cover di book dengan filename yang baru dibuat
                $pengaduan->foto = $filename;
                

                $pengaduan->save();
            }
            ;
            
            return redirect()->route('pengaduan.index');
        }

        public function merge(Request $request)
        {
            if (isset($request->duplikat)) {
                $pengaduan = Pengaduan::find($request->duplikat);        
                if (isset($request->sudah_ada)) {
                    $sudah_ada = true;
                    return view('pengaduan.merge', compact('pengaduan', 'sudah_ada'));
                }
                return view('pengaduan.merge', compact('pengaduan'));
            }

            return view('pengaduan.merge');
        }


        public function mergeupdate(Request $request)
        {
            return view('pengaduan.merge');
        }        


        public function merges(Request $request)
        {
            if (isset($request->duplicate_id)) {
                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $duplikat = Duplikat::find($request->duplicate_id);
                    $duplikat->pengaduans()->attach(Pengaduan::find($request->duplikat[$i]));
                };

                Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);                
            } else {

                $duplikat = Duplikat::create([
                    'nama' => $request->nama,
                ]) ;

                for ($i=0; $i < count($request->duplikat); $i++) { 
                    $duplikat->pengaduans()->attach(Pengaduan::find($request->duplikat[$i]));
                };

                Session::flash("flash_notification", [
                    "level"=>"success",
                    "message"=>"Berhasil menggabungkan pengaduan"
                ]);

            }



            return redirect()->route('pengaduan.index');
        }

        public function exists(Request $request)
        {
            return view('pengaduan.merge');
        }


        public function tangani($pengaduans)
        {
            $pengaduan = Pengaduan::findOrFail($pengaduans);
            $penanganan = Penanganan::create([
                'user_id' => Auth::id(),
                'pengaduan_id' => $pengaduans
            ]);

            return redirect()->route('penanganan.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        /*$pengadu = $pengaduan->penanganans->pengajuans->find($id);
        $penga = $pengadu->penyelesaians->find($id);
        */return view('pengaduan.show', compact('pengaduan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
