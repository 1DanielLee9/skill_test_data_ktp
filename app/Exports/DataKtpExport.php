<?php

namespace App\Exports;

use App\DataKtp;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataKtpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataKtp::all();
    }
}
