<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penanganan;
use App\Pengajuan;
class PenangananController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penanganan = Penanganan::with('users', 'pengaduans')->paginate(3);
        return view('penanganan.index')->with(compact('penanganan'));
    }

    public function ajukan($penanganans)
    {
        $penanganan = Penanganan::findOrFail($penanganans);
        return view('penanganan.create')->with(compact('penanganan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'penanganan_id' => 'required',
            'foto' => 'image|max:2048',
            'deskripsi' => 'required',
        ]);


        $pengajuan = Pengajuan::create(array_merge($request->except('foto'), [
            'penanganan_id' => $request->penanganan_id,
            'foto' => $request->foto,
            'deskripsi' => $request->deskripsi
        ])) ;

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
                $pengajuan->foto = $filename;
                

                $pengajuan->save();
            }
            ;
             
            return redirect()->route('pengajuan.index');
           
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
