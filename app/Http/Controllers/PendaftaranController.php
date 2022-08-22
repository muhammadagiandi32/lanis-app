<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Pendaftaran::all();

        return view('list-daftar',compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $now = Carbon::now();
        $thBln = date("m/Y");
        // $thBln = $now->year.$now->month;
        
        $cek = Pendaftaran::count();
        if ($cek == 0) {
            $urut = '001';
            $nomor = 'KLC'.'/'.$urut.'/'.$thBln;
        }else {
            $ambil = Pendaftaran::all()->last();
            $urut = (int)substr($ambil->barcode, -4) + 1;
            $nomor = 'KLC'.$urut.$thBln;
        }


        // return $nomor;

       
        return view('daftar',compact('nomor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'nama_lengkap' => ['required'],
        ]);

        Pendaftaran::create($request->all());

        return redirect('/daftar-siswa')->with('success','Selamat Anda berhasil mendaftar!');
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
