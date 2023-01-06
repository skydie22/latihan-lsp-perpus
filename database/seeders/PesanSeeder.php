<?php

namespace Database\Seeders;

use App\Models\Pesan;
use Illuminate\Database\Seeder;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesan::create([
            'penerima_id' => 2,
            'pengirim_id' => 1,
            'judul' => 'buku dipinjam',
            'isi' => 'buku sedang dipinjam',
            'status' => 'terkirim',
            'tanggal_kirim' => '2023-01-06'

        ]);

        Pesan::create([
            'penerima_id' => 3,
            'pengirim_id' => 1,
            'judul' => 'buku telah dikembalikan',
            'isi' => 'terimakasih telah mengembalikan buku',
            'status' => 'terbaca',
            'tanggal_kirim' => '2023-01-06'
        ]);

        Pesan::create([
            'penerima_id' => 2,
            'pengirim_id' => 1,
            'judul' => 'anda merusakan buku',
            'isi' => 'anda kena denda 100000',
            'status' => 'terkirim',
            'tanggal_kirim' => '2023-01-06'

        ]);
    }
}
