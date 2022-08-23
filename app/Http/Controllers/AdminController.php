<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::select('admins.*', 'admins.id as id_admin', 'users.*')
            ->join('users', 'admins.user_id', 'users.id')
            ->where('role_id', '=', 2)
            ->get();

        // return $tu;

        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->role_id = 2;
        $user->email = $request->email;
        $user->password = bcrypt('123123123');
        $user->save();

        //input dgn ini tidak perlu dgn fillable
        $siswa = new Admin;
        $siswa->hp = $request->hp;
        $siswa->user_id = $user->id;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect('admins')->with('success', 'success create new admin(staff)');
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
        $data = DB::table('users')
            ->leftjoin('admins', 'admins.user_id',  'users.id')
            ->where('users.id', $id);
        DB::table('admins')->where('user_id', $id)->delete();
        $data->delete();

        return redirect()->route('admins.index')->with('delete', 'Admin(staff) has been deleted');
    }
}
