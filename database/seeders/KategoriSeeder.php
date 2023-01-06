<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'kode' => 'umum',
            'nama' => 'Umum'
        ]);

        Kategori::create([
            'kode' => 'sains',
            'nama' => 'Sains'
        ]);

        Kategori::create([
            'kode' => 'sejarah',
            'nama' => 'Sejarah'
        ]);
    }
}
