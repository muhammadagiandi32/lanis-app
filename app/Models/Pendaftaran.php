<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'nama_sekolah',
        'anak_ke',
        'dari',
        'kelas',
        'email',
        'wali',
        'no_wali',
        'alamat',
        'keterangan',
        'status',
    ];
}
