<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\InformationCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Informasi Tentang Profil Badan Publik',
                'slug' => 'informasi-tentang-profil-badan-publik'
            ],
            [
                'name' => 'Ringkasan Program dan Kegiatan yang sedang dijalankan',
                'slug' => 'ringkasan-program-dan-kegiatan-yang-sedang-dijalankan'
            ],
            [
                'name' => 'Ringkasan Laporan Keuangan',
                'slug' => 'ringkasan-laporan-keuangan'
            ],
            [
                'name' => 'Informasi Pengadaan Barang dan Jasa',
                'slug' => 'informasi-pengadaan-barang-dan-jasa'
            ],
            [
                'name' => 'Informasi tentang Peraturan, Keputusan, atau Kebijakan yang Mengikat',
                'slug' => 'informasi-tentang-peraturan-keputusan-atau-kebijakan-yang-mengikat'
            ],
            [
                'name' => 'Informasi tentang Prosedur Peringatan Dini dan Prosedur Evakuasi Keadaan Darurat',
                'slug' => 'informasi-tentang-prosedur-peringatan-dini-dan-prosedur-evakuasi-keadaan-darurat'
            ],
            [
                'name' => 'Ringkasan Informasi tentang Kinerja',
                'slug' => 'ringkasan-informasi-tentang-kinerja'
            ],
            [
                'name' => 'Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran',
                'slug' => 'informasi-tentang-tata-cara-pengaduan-penyalahgunaan-wewenang-atau-pelanggaran'
            ],
        ];

        DB::beginTransaction();
        try {
            foreach ($data as $value) {
                Category::create([
                    'name' => $value['name'],
                    'slug' => $value['slug']
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            error_log($e->getMessage());
        }
    }
}
