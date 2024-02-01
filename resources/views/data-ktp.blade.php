@extends('layouts.app')

@section('content')
<div class="container col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn-group" role="group">
                        <a href="/data-ktp/tambah" class="btn btn-primary">Input Data KTP Baru</a>
                        <a href="/data-ktp/import" class="btn btn-success">Import</a>
                        <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="/data-ktp/exportcsv">CSV</a>
                            <a class="dropdown-item" href="/data-ktp/exportpdf">PDF</a>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover table-striped table-responsive">
                        <thead>
                            <tr class="text-center">
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat/Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>RT/RW</th>
                                <th>Kelurahan/Desa</th>
                                <th>Kecamatan</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Kewarganegaraan</th>
                                <th>Berlaku Hingga</th>
                                <th>Tempat/Tanggal Dibuat</th>
                                <th>Foto KTP</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataKtp as $data)
                            <tr>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tempat_lahir }} / {{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->rt }} / {{ $data->rw }}</td>
                                <td>{{ $data->kelurahan_desa }}</td>
                                <td>{{ $data->kecamatan }}</td>
                                <td>{{ $data->agama }}</td>
                                @if ($data->status_perkawinan == "M")

                                <td>Kawin</td>

                                @elseif ($data->status_perkawinan == "X")

                                <td>Cerai Hidup</td>

                                @elseif ($data->status_perkawinan == "D")

                                <td>Cerai Mati</td>

                                @else

                                <td>Belum Kawin</td>

                                @endif
                                <td>{{ $data->pekerjaan }}</td>
                                <td>{{ $data->kewarganegaraan }}</td>
                                <td>{{ $data->masa_berlaku }}</td>
                                <td>{{ $data->tempat_dibuat }} / {{ $data->tanggal_dibuat }}</td>
                                <td><img width="70px" height="100px" src="{{ url('/img/'.$data->file_foto) }}"></td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <a href="/data-ktp/edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                        <a href="/data-ktp/hapus/{{ $data->id }}" class="btn btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataKtp->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
