<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penerbit::create([
            'kode' => 'erlangga',
            'nama' => 'Erlangga',
        ]);

        Penerbit::create([
            'kode' => 'bse',
            'nama' => 'BSE',
        ]);

        Penerbit::create([
            'kode' => 'intermedia',
            'nama' => 'Intermedia',
        ]);
    }
}
