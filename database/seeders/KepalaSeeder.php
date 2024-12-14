<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KepalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Kepala Sekolah',
            'email' => 'kepala@email.com',
            'role' => 'admin',
            'identitas' => '222222', //masukan NIP
            'alamat' => 'Yogyakarta', //masukan alamat
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
