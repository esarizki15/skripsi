<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Keyword;
use App\Penanganan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::with('users')->paginate(8);
        return view('laporan.index')->with(compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
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
            'nama_ruangan' => 'required',
            'pengaduan' => 'required',
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);

        $pengaduan = Pengaduan::create(array_merge($request->except('foto'), [
            'user_id' => Auth::id()])) ;
            /*
            $str = (string)$request->deskripsi;
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
            
            return redirect()->route('laporan.index');
        }

        public function tangani($id)
        {
            $pengaduan = Pengaduan::findOrFail($id);
            $penanganan = Penanganan::create([
                'user_id' => Auth::user()->id,
                'pengaduan_id' => $id
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
        //
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
