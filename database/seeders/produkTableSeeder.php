<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class produkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ubah
        DB::table('produk')->insert(array(
            ['nama' => 'Meja', 'id_kategori' => '1', 'qty' => '12', 'harga_beli' => '50000', 'harga_jual' => '54000', ],
            ['nama' => 'Kursi', 'id_kategori' => '2', 'qty' => '13', 'harga_beli' => '40000', 'harga_jual' => '45000', ]
         ));
    }
}
