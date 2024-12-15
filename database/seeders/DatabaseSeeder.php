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

        $jabatan = [
            [
                'nama_jabatan' => 'Management Repr'
            ],
            [
                'nama_jabatan' => 'HSE'
            ],
            [
                'nama_jabatan' => 'Procurement'
            ],
            [
                'nama_jabatan' => 'Management Construction'
            ],
            [
                'nama_jabatan' => 'Construction'
            ],
            [
                'nama_jabatan' => 'Management HDE/Opr'
            ],
            [
                'nama_jabatan' => 'HDE/Opr'
            ],
            [
                'nama_jabatan' => 'Management Finance'
            ],
            [
                'nama_jabatan' => 'Finance'
            ],
        ];
        foreach ($jabatan as $j) {
            Jabatan::create($j);
        }

        Lowongan::create(
            [
                'jabatan' => 1,
                'status' => 'aktif',
                'deskripsi' => 'Finance JobDesk',
            ]
        );

        User::create([
            'nama' => 'Budi',
            'jabatan' => 'Pelamar',
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'budi',
            'password' => bcrypt('123'),
        ]);
        Rekrutmen::create([
            'id_pelamar' => 1,
            'id_lowongan' => 1,
            'status' => 'Diterima',
            'file' => 'file.pdf',
        ]);

        User::create([
            'nama' => 'Admin',
            'jabatan' => 'Admin',
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'nama' => 'Direktur',
            'jabatan' => 'Direktur',
            'divisi_id' => 1,
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'direktur',
            'password' => bcrypt('123'),
        ]);

        User::create([
            'nama' => 'Karyawan 1',
            'jabatan' => 'Karyawan',
            'divisi_id' => 2,
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'karyawan',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'nama' => 'Karyawan 2',
            'jabatan' => 'Karyawan',
            'divisi_id' => 1,
            'status' => '',
            'status_kerja' => '',
            'nik' => '',
            'umur' => '20',
            'telepon' => '0812343710',
            'alamat' => 'Jl. Sukamaju',
            'username' => 'karyawan 2',
            'password' => bcrypt('123'),
        ]);
    }
}
