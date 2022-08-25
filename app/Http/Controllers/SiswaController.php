<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\TagihanBuku;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::select('*', 'siswas.id as id_siswa')
            ->leftjoin('users', 'siswas.user_id', 'users.id')
            ->where('role_id', '=', 3)
            ->paginate(15);
        // ->get();

        // return $siswas;

        return view('admin.siswa.index', compact('siswas'));
    }

    public function dashboard()
    {
        $siswa = User::select('siswas.*', 'users.*')
            ->join('siswas', 'users.id', 'siswas.user_id')
            ->where('users.id', '=', auth()->id())
            ->first();

        // return $siswa;

        return view('admin.siswa.dashboard', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.siswa.create');
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
        $user = new User;
        $user->name = $request->name;
        $user->nis = $request->nis;
        $user->role_id = 3;
        $user->email = $request->email;
        $user->password = bcrypt('123123123');
        $user->save();

        //input dgn ini tidak perlu dgn fillable
        $siswa = new Siswa;
        $siswa->hp = $request->hp;
        $siswa->user_id = $user->id;
        $siswa->nama_orangtua = $request->ortu;
        $siswa->alamat = $request->alamat;
        $siswa->kelas = $request->kelas;
        $siswa->save();

        return redirect('siswas')->with('success', 'success create new siswa');
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
    public function edit()
    {
        $siswa = User::select('*')
            ->leftjoin('siswas', 'siswas.user_id',  'users.id')
            ->where('siswas.user_id', '=', auth()->id())
            ->first();


        // return $siswa;

        return view('admin.siswa.update', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Siswa $siswa)
    {

        request()->validate([
            'name' => 'required',
            'alamat' => 'required',
        ]);


        DB::table('users')
            ->where('id', auth()->id())
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);


        DB::table('siswas')
            ->where(
                'user_id',
                $siswa->user_id
            )
            ->update(['alamat' => $request->alamat]);
        // $siswa->update($request->all());


        // $user = User::find($siswa->id);
        // $user->name = $request->name;
        // $user->nis = $request->nis;
        // $user->role_id = 3;
        // $user->email = $request->email;


        // $siswa = Siswa::find($siswa->user_id);

        // $siswa->hp = $request->hp;
        // $siswa->user_id = $request->id;
        // $siswa->nama_orangtua = $request->ortu;
        // $siswa->alamat = $request->alamat;
        // $siswa->kelas = $request->kelas;
        // $siswa->save();
        // $user->save();

        // dd(DB::getQueryLog());

        return  redirect('dashboard.siswa')->with('success', 'Siswa updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $id->delete();
    }
}
