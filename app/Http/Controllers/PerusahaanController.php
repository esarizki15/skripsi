<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Session;
class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::paginate(10);
        return view('perusahaan.index')->with(compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
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
            'nama' => 'required|unique:perusahaans',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'detail' => 'required',
        ]);

        $perusahaan = Perusahaan::create([
            'nama' => $request->nama,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'detail' => $request->detail,
        ]) ;

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $perusahaan->nama"
        ]);
        return redirect()->route('perusahaan.index');
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
        $perusahaan = Perusahaan::find($id);
        return view('perusahaan.edit')->with(compact('perusahaan'));
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
        $this->validate($request, [
            'nama' => 'required|unique:perusahaans,nama,'. $id,
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'detail' => 'required',
    ]);
        $perusahaan = Perusahaan::find($id);
        $perusahaan->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $perusahaan->nama"
        ]);
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Perusahaan::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Detail perusahaan berhasil dihapus"
        ]);
        return redirect()->route('perusahaan.index');
    }
}
