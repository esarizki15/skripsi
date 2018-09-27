<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyelesaian;
class PenyelesaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'pengajuan_id' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $penyelesaian = Penyelesaian::create([
            'pengajuan_id' => $request->pengajuan_id,
            'status' => true,
            'keterangan' => $request->keterangan
        ]) ;

        return redirect()->route('pengajuan.index');
    }

    public function stores(Request $request)
    {
        $this->validate($request, [
            'pengajuan_id' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $penyelesaian = Penyelesaian::create([
            'pengajuan_id' => $request->pengajuan_id,
            'status' => false,
            'keterangan' => $request->keterangan
        ]) ;

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
