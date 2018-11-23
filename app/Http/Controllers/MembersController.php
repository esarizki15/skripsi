<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempat;
use App\RoleUser;
use App\User;
use App\Role;
use DB;
class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        //$use = $user->all();
        //dd($use);
        /*$user = DB::table('role_users')
                ->select('user_id', DB::raw('Count(tempat_id) as tempats'))
                ->groupBy('user_id')
                ->havingRaw('Count(tempat_id) > ?', [1])
                ->get();
        */
        //dd($user);
        return view('members.index')->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasi = Tempat::whereNull('tempat_id')->pluck('nama', 'id')->all();
        //dd($lokasi);
        return view('members.create');
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
            'name' => 'required|unique:users',
            'jabatan' => 'required',
            'role'=>'required',
            'email' => 'required|unique:users',
            'password'=>'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> $request->password,
            'hp'=> $request->phone,
            'jabatan'=> $request->jabatan,
        ]) ;

        for ($i=0; $i < count($request->role); $i++) { 
            $user->roles()->attach(Role::find($request->role[$i]));
        }

        return redirect()->route('member.index');
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
