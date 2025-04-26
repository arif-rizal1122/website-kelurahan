<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Surat;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $surats = Surat::all();

        if ($surats->isEmpty()) {
            $this->command->warn('Tidak ada data surat ditemukan. Jalankan dulu seeder surat.');
            return;
        }

        foreach ($surats->shuffle()->take(15) as $surat) {
            for ($i = 0; $i < $faker->numberBetween(1, 3); $i++) {
                $filename = Str::random(10) . '_' . $faker->word . '.pdf';
                $path = 'attachments/' . $filename;

                // Simpan file dummy di disk 'public'
                Storage::disk('public')->put($path, $faker->paragraph());

                Attachment::create([
                    'surat_id' => $surat->id,
                    'path' => $path,
                    'filename' => $filename,
                    'extension' => 'pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}