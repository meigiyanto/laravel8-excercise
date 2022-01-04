<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
        insert data ke table pegawai
        DB::table('pegawai')->insert([
	        'pegawai_nama' => 'Joni Munandar',
	        'pegawai_jabatan' => 'Web Designer',
	        'pegawai_umur' => 25,
	        'pegawai_alamat' => 'Jl. Panglateh'
        ]);
        */
        $faker = Faker::create('id_ID');
        
        for($i = 1; $i <= 50; $i++) {
        
	        // insert data ke table pegawai menggunakan Faker
	        DB::table('pegawai')->insert([
		        'pegawai_nama' => $faker->name,
		        'pegawai_jabatan' => $faker->jobTitle,
		        'pegawai_umur' => $faker->numberBetween(25,40),
		        'pegawai_alamat' => $faker->address
	        ]);
        }
    }
}