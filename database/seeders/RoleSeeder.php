<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KetuaYayasan;
use App\Models\User;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Siswa;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ketua yayasan
        $role = Role::create([
            'nama' => 'ketua  yayasan'
        ]);

        $ketua = User::create([
            'name' => 'ketua',
            'email' => 'ketua@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => $role->id
        ]);

        KetuaYayasan::create([
            'user_id' => $ketua->id,
            'hp' => '085123456789',
            'alamat' => 'jl. gajah'
        ]);

        // tatausaha
        $role = Role::create([
            'nama' => 'admin'
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => $role->id
        ]);

        Admin::create([
            'user_id' => $admin->id,
            'hp' => '085123456789',
            'alamat' => 'jl. gajah'
        ]);

        // siswa
        $role = Role::create([
            'nama' => 'siswa'
        ]);

        $siswa = User::create([
            'name' => 'agi',
            'email' => 'agi@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => $role->id
        ]);

        Siswa::create([
            'user_id' => $siswa->id,
            'nama_orangtua' => 'Dede',
            'hp' => '085123456789',
            'alamat' => 'jl. gajah',
        ]);
    }
}
