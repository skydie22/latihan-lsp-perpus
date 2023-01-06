<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(PenerbitSeeder::class);
        $this->call(BukuSeeder::class);
        $this->call(PeminjamanSeeder::class);
        $this->call(PemberitahuanSeeder::class);
        $this->call(PesanSeeder::class);
        $this->call(IdentitasSeeder::class);
    }
}
