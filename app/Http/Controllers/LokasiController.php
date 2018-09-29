<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use Storage;
use QRCode;
class LokasiController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data = RajaOngkir::Provinsi()->all();
        $datas = $data;
        
        *//*
        $rajaongkir = new Rajaongkir('f234bf61de2b3569f2362fabb9de2722', Rajaongkir::ACCOUNT_STARTER);
         
         // inisiasi dengan config array
         $config['api_key'] = 'f234bf61de2b3569f2362fabb9de2722';
         $config['account_type'] = 'starter';
         
         $rajaongkir = new Rajaongkir($config);

         $cities = collect($rajaongkir->getSubdistricts());
         dd($cities);*/
        /*
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $response = $request->getBody()->getContents();
        $respon = json_decode($response, true);/*
        $resp = $respon['semuaprovinsi']['nama'];
        dd($resp);*/
        /*
        @forelse ($respon['semuaprovinsi'] as $log)
                                   / <tr>
                                        <td>{{ $log['nama'] }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
        return view('lokasi.index')->with(compact('respon'));*/
        /*@forelse ($respon['semuaprovinsi'] as $log)
                                    <tr>
                                        <td>{{ $log['id'] }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse*/
        $lokasi = Lokasi::paginate(10);
        return view('lokasi.index')->with(compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$data = collect(RajaOngkir::Provinsi()->all()) ;
        $plucked = $data->pluck('province');
        dd($plucked);
        {!! Form::select('province', [''=>'']+collect(RajaOngkir::Provinsi()->all())->pluck(['province'])->toArray(), null, 
    ['class'=>'js-selectize form-control', 'placeholder' => 'Pilih Provinsi', 'id'=>'province']) !!}*/
        /*$rajaongkir = new Rajaongkir('f234bf61de2b3569f2362fabb9de2722', Rajaongkir::ACCOUNT_STARTER);
         
         // inisiasi dengan config array
         $config['api_key'] = 'f234bf61de2b3569f2362fabb9de2722';
         $config['account_type'] = 'starter';
         
         $rajaongkir = new Rajaongkir($config);

         $provinces = collect($rajaongkir->getProvinces());

         <div class="form-group {!! $errors->has('kota') ? 'has-error' : '' !!}">
    {!! Form::label('kota', 'Kota', ['class'=>'col-sm-4 control-label']) !!}
    <div class="col-sm-6">
    {!! Form::select('kota', [''=>'']+collect($rajaongkir->getCities())->pluck('city_name')->toArray(), null, 
    ['class'=>'js-selectize form-control', 'placeholder' => 'Pilih Kota', 'id'=>'kota']) !!}
        {!! $errors->first('kota', '<p class="help-block">:message</p>') !!}
    </div>
</div>
      $client = new \GuzzleHttp\Client();
        $request = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $response = $request->getBody()->getContents();
        $respon = json_decode($response, true);
        return view('lokasi.create')->with(compact('respon'));*/
        return view('lokasi.create');
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
            'area' => 'required|exists:areas,id',
            'nama' => 'required',
            'detail' => 'required',
        ]);


        $lokasi = Lokasi::create([
            'area_id' => $request->area,
            'nama' => $request->nama,
            'detail' => $request->detail,
        ]) ;

        return redirect()->route('lokasi.index');
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
