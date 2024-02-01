<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKtp extends Model
{
    protected $table = 't_data_ktp';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'kelurahan_desa',
        'kecamatan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'masa_berlaku',
        'file_foto',
        'tempat_dibuat',
        'tanggal_dibuat'
    ];
}
