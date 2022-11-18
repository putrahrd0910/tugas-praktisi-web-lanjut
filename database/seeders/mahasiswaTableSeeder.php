<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class mahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert(array(
            ['nama' => 'Putra', 'nim' => '362155123', 'tgl_lahir' => '2002-10-09', 
            'alamat' => 'Banyuwangi', 'prodi' => 'TRPL', 'ipk' => '3.9', ],
            ['nama' => 'Amelia', 'nim' => '436733234', 'tgl_lahir' => '2002-12-27', 
            'alamat' => 'Jember', 'prodi' => 'MBP', 'ipk' => '3.75', ]
            
         ));
    }
}
