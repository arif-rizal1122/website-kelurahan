<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ConfigSeeder::class,
            UserSeeder::class,
            UnitSeeder::class,
            TwebPendudukSeeder::class,
            SuratMasukSeeder::class,
            SuratKeluarSeeder::class,
            AttachmentSeeder::class,
            WargaSeeder::class,
            JenisSuratSeeder::class,
            PengajuanSuratSeeder::class
        ]);
    }
}
