<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama' => 'Test User',
            'username' => 'test',
            'password' => bcrypt('123'),
            'jabatan' => 'Pelamar'
        ]);

        Lowongan::create(
            [
                'jabatan' => 'Software Engineer',
                'status' => 'aktif',
                'deskripsi' => 'Membuat aplikasi berbasis web'
            ]
        );
        $jabatan = [
            [
                'jabatan' => 'Software Engineer'
            ],
            [
                'jabatan' => 'UI/UX Designer'
            ],
            [
                'jabatan' => 'Data Scientist'
            ],
            [
                'jabatan' => 'Product Manager'
            ],
            [
                'jabatan' => 'Quality Assurance'
            ],
        ];
        foreach ($jabatan as $j) {
            Jabatan::create($j);
        }
    }
}
