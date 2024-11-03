<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\Lowongan;
use App\Models\Rekrutmen;
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
            'jabatan' => 'Pelamar',
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'test',
            'password' => bcrypt('123'),
        ]);

        Lowongan::create(
            [
                'jabatan' => 'Software Engineer',
                'status' => 'aktif',
                'deskripsi' => 'Membuat aplikasi berbasis web'
            ]
        );

        Rekrutmen::create([
            'id_pelamar' => 1,
            'id_lowongan' => 1,
            'status' => 'Diterima',
            'file' => 'file.pdf',
        ]);

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
