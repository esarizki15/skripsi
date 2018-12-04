<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Tempat;
use App\Perusahaan;
use Session;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $area = Tempat::all()->where('tempat_id','=', null);
        return view('area.index')->with(compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
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
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'nama' => 'required|unique:areas',
        ]);


        $area = Tempat::create([
            'perusahaan_id' => $request->perusahaan_id,
            'nama' => $request->nama,
        ]) ;

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $area->nama"
        ]);

        return redirect()->route('area.index');
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
        $area = Tempat::find($id);
        return view('area.edit')->with(compact('area'));
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
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'nama' => 'required|unique:areas',
        ]);


        $area = Tempat::find($id);
        $area->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $area->nama"
        ]);
        return redirect()->route('area.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Tempat::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Detail Area berhasil dihapus"
        ]);
        return redirect()->route('area.index');
    }
}
