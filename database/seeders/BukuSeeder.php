<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'cara memasak nasi',
            'kategori_id' => 1,
            'penerbit_id' => 1,
            'pengarang' => 'ezhar',
            'tahun_terbit' => '2012',
            'isbn' => '23265768687686',
            'j_buku_baik' => 25,
            'j_buku_rusak' => 10,
            'foto' => ''
        ]);

        Buku::create([
            'judul' => 'ensiklopedia sains',
            'kategori_id' => 2,
            'penerbit_id' => 2,
            'pengarang' => 'ali',
            'tahun_terbit' => '2015',
            'isbn' => '21232138797997',
            'j_buku_baik' => 30,
            'j_buku_rusak' => 10,
            'foto' => ''
        ]);

        Buku::create([
            'judul' => 'angkasa raya',
            'kategori_id' => 3,
            'penerbit_id' => 3,
            'pengarang' => 'zoe',
            'tahun_terbit' => '2022',
            'isbn' => '123213213213213213',
            'j_buku_baik' => 25,
            'j_buku_rusak' => 10,
            'foto' => ''
        ]);

    }
}
