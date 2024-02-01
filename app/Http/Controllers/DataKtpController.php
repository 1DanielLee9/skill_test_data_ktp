<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\DataKtp;
use App\Exports\DataKtpExport;
use App\Imports\DataKtpImport;

class DataKtpController extends Controller
{

    public function show(){

        $dataKtp = DataKtp::paginate(15);
        return view('data-ktp', ['dataKtp'=> $dataKtp]);

    }

    public function goToAdd(){

        return view('tambah-data-ktp');

    }

    public function add(Request $request){

        $expDate;

        if ($request->masa_berlaku_date == null) {
            $expDate = $request->masa_berlaku_check;
        } else {
            $expDate = $request->masa_berlaku_date;
        }


        $file = $request->file('file_foto');
        DataKtp::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan_desa' => $request->kelurahan_desa,
            'kecamatan' => $request->kecamatan,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'masa_berlaku' => $expDate,
            'file_foto' => $file->getClientOriginalName(),
            'tempat_dibuat' => $request->tempat_dibuat,
            'tanggal_dibuat' => $request->tanggal_dibuat

        ]);

        $upload_folder = 'img';
        $file->move($upload_folder,$file->getClientOriginalName());

        return redirect('/data-ktp');
    }

    public function goToEdit($id){

        $dataKtp = DataKtp::find($id);
        return view('edit-data-ktp', ['dataKtp'=> $dataKtp]);

    }


    public function update($id, Request $request){
        $dataKtp = DataKtp::find($id);

        $expDate;

        if ($request->masa_berlaku_date == null) {
            $expDate = $request->masa_berlaku_check;
        } else {
            $expDate = $request->masa_berlaku_date;
        }

        $file = $request->file('file_foto');

        $dataKtp->nik = $request->nik;
        $dataKtp->nama = $request->nama;
        $dataKtp->tempat_lahir = $request->tempat_lahir;
        $dataKtp->tanggal_lahir = $request->tanggal_lahir;
        $dataKtp->jenis_kelamin = $request->jenis_kelamin;
        $dataKtp->alamat = $request->alamat;
        $dataKtp->rt = $request->rt;
        $dataKtp->rw = $request->rw;
        $dataKtp->kelurahan_desa = $request->kelurahan_desa;
        $dataKtp->kecamatan = $request->kecamatan;
        $dataKtp->agama = $request->agama;
        $dataKtp->status_perkawinan = $request->status_perkawinan;
        $dataKtp->pekerjaan = $request->pekerjaan;
        $dataKtp->kewarganegaraan = $request->kewarganegaraan;
        $dataKtp->masa_berlaku = $expDate;
        $dataKtp->file_foto = $file->getClientOriginalName();
        $dataKtp->tempat_dibuat = $request->tempat_dibuat;
        $dataKtp->tanggal_dibuat = $request->tanggal_dibuat;
        $dataKtp->save();

        $upload_folder = 'img';
        $file->move($upload_folder,$file->getClientOriginalName());

        return redirect('/data-ktp');
    }

    public function delete($id){

        $dataKtp = DataKtp::find($id);
        $dataKtp->delete();

        return redirect('/data-ktp');
    }

    public function import(){

        // $file = $request->file('file_import');
        // $fileName = $file->getClientOriginalName();

        Excel::import(new DataKtpImport, storage_path('data-ktp.csv'), null, \Maatwebsite\Excel\Excel::CSV);
        return redirect('/data-ktp');
    }

    public function exportCsv(){
        return Excel::download(new DataKtpExport, 'data-ktp.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportPdf(){
        return Excel::download(new DataKtpExport, 'data-ktp.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
