<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        $siswa = User::select('siswas.*', 'users.*')
            ->join('siswas', 'siswas.user_id', 'users.id')
            ->where('users.id', '=', auth()->id())
            ->first();

        return view('password/edit', compact('siswa'));
    }

    public function update()
    {
        // dd("succes");
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $olPassword = request('old_password');

        if (Hash::check($olPassword, $currentPassword)) {

            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return back()->with('success', 'Your are changed your password ');
        } else {
            return back()->withErrors(['old_password' => 'Make sure you fill your current password']);
        }
    }
}
