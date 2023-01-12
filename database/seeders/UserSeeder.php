<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           
            'kode' => 'A1',
            'fullname' => 'Ezhar Mahesa',
            'username' => 'ezhar',
            'password' => bcrypt('password'),			
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => '2023-01-06',
            'foto' => ''
        ]);

        User::create([
           
            'kode' => 'A2',
            'nis' => '12345',
            'fullname' => 'Dwi Arya',
            'username' => 'dwi',
            'password' => bcrypt('password'),			
            'kelas' => 'XII RPL',	
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => '2023-01-06',
            'foto' => ''
        ]);

        User::create([
           
            'kode' => 'A3',
            'nis' => '12456',
            'fullname' => 'Zoe Mohamed',
            'username' => 'zoe',
            'password' => bcrypt('password'),			
            'kelas' => 'XII RPL',	
            'role' => 'user',
            'join_date' => '2023-01-06',
            'foto' => ''
        ]);
    }
}
