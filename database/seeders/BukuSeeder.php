<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use Illuminate\Support\Facades\Hash;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Buku::create([
            'nama_buku' => 'Sepeda Ontel Kinanti',
            'penulis' => 'Iwok Abqary',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Gadis Kecil Penjaga Bintang',
            'penulis' => 'Wikan Satriati',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Misteri Pharao Matahari (3 Sahabat, #2)',
            'penulis' => 'Kusumastuti',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Si Pitung Superhero Betawi Asli',
            'penulis' => 'Soekanto S.A',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Misteri AEIOU (3 Sahabat, #1)',
            'penulis' => 'Kusumastuti',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Orang-orang tercinta: kumpulan cerpen anak',
            'penulis' => 'Soekanto S. A.',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Aku Sayang Ayah',
            'penulis' => 'Eka Wardhana',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Aku Sayang Kakak',
            'penulis' => 'Eka Wardhana',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => 'Sejuta Warna Pelangi',
            'penulis' => ' Clara Ng',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Buku::create([
            'nama_buku' => '7 Kisah Pengantar Tidur: Dongeng Tujuh Menit',
            'penulis' => ' Clara Ng',
            'tahun_rilis' => '2024',
            'kategori_id' => 1,
            'photo' => 'null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
