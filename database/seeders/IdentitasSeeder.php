<?php

namespace Database\Seeders;

use App\Models\Identitas;
use Illuminate\Database\Seeder;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identitas::create([
            'nama_app' => 'PERPUSTAKAAN SMKN 10 JAKARTA',
            'alamat_app' => 'jl smean 6, cawang, kramat Jati, Jakarta Timur',
            'email_app' => 'mujahi@gmail.com',
            'nomor_hp' => '8123456789',
            'foto' => ''
        ]);
    }
}
