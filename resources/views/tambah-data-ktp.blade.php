@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data KTP') }}
                    <a href="/data-ktp" class="mb-0 mt-0 float-right btn btn-danger" >Kembali</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="/data-ktp/save-data" enctype="multipart/form-data">
                        @csrf
                        {{-- buat NIK auto generate nanti --}}

                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                            <div class="col-md-4">
                                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-success" onclick="randomNik()">Generate NIK</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat/Tanggal Lahir') }}</label>

                            <div class="col-md-3">
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" autofocus>

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir" autofocus>

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <input id="laki-laki" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="L" required >
                                    <label for="laki-laki" class="form-check-label">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <input id="perempuan" type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="P" required >
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" >

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rt" class="col-md-4 col-form-label text-md-right">{{ __('RT/RW') }}</label>

                            <div class="col-md-3">
                                <input id="rt" type="number" class="form-control @error('rt') is-invalid @enderror" name="rt" value="{{ old('rt') }}" required autocomplete="rt" >

                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input id="rw" type="number" class="form-control @error('rw') is-invalid @enderror" name="rw" value="{{ old('rw') }}" required autocomplete="rw" >

                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelurahan_desa" class="col-md-4 col-form-label text-md-right">{{ __('Kelurahan/Desa') }}</label>

                            <div class="col-md-6">
                                <input id="kelurahan_desa" type="text" class="form-control @error('kelurahan_desa') is-invalid @enderror" name="kelurahan_desa" required>

                                @error('kelurahan_desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">
                                <input id="kecamatan" type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" required>

                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

                            <div class="col-md-6">
                                <select id="agama" class="form-control" name="agama">
                                    <option selected disabled>Pilih salah satu...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_perkawinan" class="col-md-4 col-form-label text-md-right">{{ __('Status Perkawinan') }}</label>

                            <div class="col-md-6">
                                <select id="status_perkawinan" class="form-control" name="status_perkawinan">
                                    <option selected disabled>Pilih salah satu...</option>
                                    <option value="U">Belum Kawin</option>
                                    <option value="M">Kawin</option>
                                    <option value="X">Cerai Hidup</option>
                                    <option value="D">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" required>

                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kewarganegaraan" class="col-md-4 col-form-label text-md-right">{{ __('Kewarganegaraan') }}</label>

                            <div class="col-md-6">
                                <input id="kewarganegaraan" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" required>

                                @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="masa-berlaku-date" class="col-md-4 col-form-label text-md-right">{{ __('Masa Berlaku') }}</label>

                            <div class="col-md-3">
                                <input id="masa-berlaku-date" type="date" class="form-control @error('masa-berlaku-date') is-invalid @enderror" name="masa_berlaku_date">

                                @error('masa-berlaku-date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline">
                                    <input id="masa-berlaku-checkbox" type="checkbox" class="form-check-input" name="masa_berlaku_check" value="Seumur Hidup" onclick="masaBerlakuCheckbox()">
                                    <label for="masa-berlaku-checkbox" class="form-check-label">Seumur Hidup</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>

                            <div class="col-md-6">
                                <input id="file_foto" type="file" class="form-control" name="file_foto" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat_dibuat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat/Tanggal Dibuat') }}</label>

                            <div class="col-md-3">
                                <input id="tempat_dibuat" type="text" class="form-control @error('tempat_dibuat') is-invalid @enderror" name="tempat_dibuat" value="{{ old('tempat_dibuat') }}" required autocomplete="tempat_dibuat" autofocus>

                                @error('tempat_dibuat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input id="tanggal_dibuat" type="date" class="form-control @error('tanggal_dibuat') is-invalid @enderror" name="tanggal_dibuat" value="{{ old('tanggal_dibuat') }}" required autocomplete="tanggal_dibuat" autofocus>

                                @error('tanggal_dibuat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
