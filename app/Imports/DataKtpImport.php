<?php

namespace App\Imports;

use App\DataKtp;
use Maatwebsite\Excel\Concerns\ToModel;

class DataKtpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataKtp([
            'nik' => $row[0],
            'nama' => $row[1],
            'tempat_lahir' => $row[2],
            'tanggal_lahir' => $row[3],
            'jenis_kelamin' => $row[4],
            'alamat' => $row[5],
            'rt' => $row[6],
            'rw' => $row[7],
            'kelurahan_desa' => $row[8],
            'kecamatan' => $row[9],
            'agama' => $row[10],
            'status_perkawinan' => $row[11],
            'pekerjaan' => $row[12],
            'kewarganegaraan' => $row[13],
            'masa_berlaku' => $row[14],
            'file_foto' => $row[15],
            'tempat_dibuat' => $row[16],
            'tanggal_dibuat' => $row[17]
        ]);
    }
}
