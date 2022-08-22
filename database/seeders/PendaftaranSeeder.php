<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Pendaftaran;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 5; $i++) {

            $daftar = new Pendaftaran;
            $daftar->no = $faker->randomNumber(8);
            $daftar->nama_lengkap = $faker->name();
            $daftar->nama_panggilan = $faker->name();
            $daftar->tempat_lahir = 'Jakarta';
            $daftar->tgl_lahir = '1995-05-05';
            $daftar->jenis_kelamin = 'Laki-laki';
            $daftar->anak_ke = 1;
            $daftar->dari = 2;
            $daftar->kelas = 3;
            $daftar->nama_sekolah = 'SMK AA';
            $daftar->email = $faker->unique()->safeEmail;
            $daftar->wali = $faker->name();
            $daftar->no_wali = '0838' . $faker->randomNumber(8);
            $daftar->alamat = $faker->address();
            $daftar->keterangan = 'Umum';
            $daftar->status = 1;
            $daftar->save();
        }
    }
}
