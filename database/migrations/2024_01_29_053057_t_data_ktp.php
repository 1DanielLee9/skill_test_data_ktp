<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TDataKtp extends Migration
{
    /**
     * Run the migrations.
     *
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_data_ktp', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('nik',16)->unique();
            $table->string('nama',100)->unique();
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->char('jenis_kelamin', 1);
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kelurahan_desa',50);
            $table->string('kecamatan',50);
            $table->string('agama',20);
            $table->char('status_perkawinan',1);
            $table->string('pekerjaan',20);
            $table->string('kewarganegaraan',20);
            $table->string('masa_berlaku',50);
            $table->string('file_foto');
            $table->string('tempat_dibuat');
            $table->date('tanggal_dibuat');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_data_ktp');
    }
}
