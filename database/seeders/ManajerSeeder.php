<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManajerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Bersihkan database: Hapus SEMUA user yang NIK-nya BUKAN 1633
        User::where('nik', '!=', '1633')->delete();

        // 2. Buat atau perbarui akun khusus Bapak Sofyan
        $user = User::updateOrCreate(
            ['nik' => '1633'],
            [
                'name' => 'SOFYAN',
                'password' => Hash::make('welcome123'),
            ]
        );

        // 3. Berikan hak akses tertinggi (Super Admin)
        $user->syncRoles(['super_admin']);
    }
}