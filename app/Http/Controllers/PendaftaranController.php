<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
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

        // return $daftar;
        return view('list-daftar',compact('daftar'));
    }

    public function status($id)
    {

        // return $status;
        $status = Pendaftaran::find($id);
        $status->status = 0;
        $status->update();

        $user = new User;
        $user->name = $status->nama_lengkap;
        $user->email = $status->email;
        $user->role_id = 3;
        $user->password = bcrypt('123123123');
        $user->save();

        $siswa = new Siswa;
        $siswa->hp = $status->no_wali;
        $siswa->no_pendaftaran = $status->no;
        $siswa->user_id = $user->id;
        $siswa->nama_lengkap = $status->nama_lengkap;
        $siswa->nama_orangtua = $status->wali;
        $siswa->jenis_kelamin = $status->jenis_kelamin;
        $siswa->nama_sekolah = $status->nama_sekolah;
        $siswa->kelas = $status->kelas;
        $siswa->alamat = $status->alamat;
        $siswa->save();

        return redirect('list-siswa')->with('success', 'Siswa telah aktif');
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
