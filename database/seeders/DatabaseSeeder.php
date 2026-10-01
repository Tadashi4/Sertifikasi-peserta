<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // untuk data admin untuk login
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Data Dummy Skema
        $skema1 = Skema::create([
            'kd_skema' => 'SKM-001',
            'nm_skema' => 'Junior Web Developer',
            'jenis' => 'KKNI Level 4',
            'jml_unit' => 6,
        ]);

        $skema2 = Skema::create([
            'kd_skema' => 'SKM-002',
            'nm_skema' => 'Data Analyst',
            'jenis' => 'Okupasi',
            'jml_unit' => 8,
        ]);

        // 3. Data Dummy Peserta
        Peserta::create([
            'id_skema' => $skema1->id,
            'kd_peserta' => 'PST-001',
            'nm_peserta' => 'Budi Santoso',
            'jk' => 'L',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'no_hp' => '081234567890',
        ]);

        Peserta::create([
            'id_skema' => $skema1->id,
            'kd_peserta' => 'PST-002',
            'nm_peserta' => 'Siti Aminah',
            'jk' => 'P',
            'alamat' => 'Jl. Mawar No. 5, Bandung',
            'no_hp' => '089876543210',
        ]);
    }
}
