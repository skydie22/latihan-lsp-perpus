<?php

namespace Database\Seeders;

use App\Models\Pemberitahuan;
use Illuminate\Database\Seeder;

class PemberitahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemberitahuan::create([
            'isi' => 'maaf, saya capek',
            'status' => 'aktif'
        ]);

        Pemberitahuan::create([
            'isi' => 'maaf, sedang sibuk',
            'status' => 'nonaktif'
        ]);

        Pemberitahuan::create([
            'isi' => 'maaf, web sedang di maintenance',
            'status' => 'aktif'
        ]);
    }
}
