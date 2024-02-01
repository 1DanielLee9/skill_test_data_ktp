<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DataKtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10000; $i++) {

            //   this section is to create nik
            $randomNumber = 0;
            for ($j=0; $j < 15; $j++) {
                $random = rand()&9;
                $randomNumber = strval($randomNumber).$random;
            }

            //name and gender
            if ($i % 2 == 0) {
                $name = $faker->name('male');
                $gender = "L";
            } else {
                $name = $faker->name('female');
                $gender = "P";
            }

            //religion and marriage status
            $agama = array("Islam","Kristen", "Katholik", "Hindu", "Buddha", "Kong Hu Chu");
            $agamaArrLength = count($agama);
            $countAgama;

            if($i < $agamaArrLength){
                $countAgama = $i;
            } elseif($i % $agamaArrLength == 0) {
                $countAgama = 0;
            } elseif($i % $agamaArrLength == 1) {
                $countAgama = 1;
            } elseif($i % $agamaArrLength == 2) {
                $countAgama = 2;
            } elseif($i % $agamaArrLength == 3) {
                $countAgama = 3;
            } elseif($i % $agamaArrLength == 4) {
                $countAgama = 4;
            } elseif($i % $agamaArrLength == 5) {
                $countAgama = 5;
            } else {
                echo "error";
            }

            $statusPerkawinan = array("U","M","X","D");
            $statusPerkawinanArrLength = count($statusPerkawinan);
            $countStatusPerkawinan;

            if($i < $statusPerkawinanArrLength){
                $countStatusPerkawinan = $i;
            } elseif($i % $statusPerkawinanArrLength == 0) {
                $countStatusPerkawinan = 0;
            } elseif($i % $statusPerkawinanArrLength == 1) {
                $countStatusPerkawinan = 1;
            } elseif($i % $statusPerkawinanArrLength == 2) {
                $countStatusPerkawinan = 2;
            } elseif($i % $statusPerkawinanArrLength == 3) {
                $countStatusPerkawinan = 3;
            } else {
                echo "error";
            }

            DB::table('t_data_ktp')->insert([
            'nik' => $randomNumber,
            'nama' => $name,
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => $faker->date('d-m-Y','-17 years'),
            'jenis_kelamin' => $gender,
            'alamat' => $faker->streetAddress,
            'rt' => rand(0,20),
            'rw' => rand(0,10),
            'kelurahan_desa' => $faker->streetName,
            'kecamatan' => $faker->city,
            'agama' => strval($agama[$countAgama]),
            'status_perkawinan' => strval($statusPerkawinan[$countStatusPerkawinan]),
            'pekerjaan' => $faker->jobTitle,
            'kewarganegaraan' => "WNI",
            'masa_berlaku' => "Seumur Hidup",
            'file_foto' => 'image.jpeg',
            'tempat_dibuat' => $faker->city,
            'tanggal_dibuat' => $faker->date('d-m-Y','-17 years')
            ]);

        }
    }
}
