<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class createSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
 
    	for($i = 1; $i <= 10; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table
                ('siswas')->insert([
    			'id_jenkel' => 1,
    			'nama' => $faker->name,
    			'tgl_lahir' => $faker->date($format = "Y-m-d"),
    			'nik' => $faker->postcode,
                'jurusan'=> $faker->randomElement(["RPL", "DMM", "TKJ"]),
                'angkatan'=> $faker->randomDigit(),
                "alamat" => $faker->address
    		]);
 
    	}
    }
}
