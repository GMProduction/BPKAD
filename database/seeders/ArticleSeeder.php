<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dapatkan user pertama sebagai author, jika tidak ada, buat user default
        $author = User::first();
        if (!$author) {
            $author = User::create([
                'username' => 'admin',
                'name' => 'Administrator BPKAD',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ]);
        }

        $articles = [
            [
                'title' => 'Sosialisasi Pengelolaan Barang Milik Daerah Kabupaten BPKAD',
                'type_article' => 2,
                'description' => '<p>BPKAD menyelenggarakan acara sosialisasi pengelolaan Barang Milik Daerah (BMD) guna meningkatkan efisiensi dan transparansi penggunaan aset daerah. Acara ini dihadiri oleh perwakilan seluruh Organisasi Perangkat Daerah (OPD) di lingkungan pemerintahan daerah.</p><p>Kepala BPKAD menyampaikan bahwa penataan aset harus dilakukan secara tertib dan berkala guna menghindari penyalahgunaan dan memperjelas status hukum kepemilikan aset daerah.</p>',
                'is_highline' => true,
            ],
            [
                'title' => 'BPKAD Menggelar Bimtek Penatausahaan Keuangan Daerah Tahun 2026',
                'type_article' => 2,
                'description' => '<p>Untuk menyamakan persepsi dan meningkatkan keahlian para bendahara, BPKAD menyelenggarakan Bimbingan Teknis (Bimtek) Penatausahaan Keuangan Daerah.</p><p>Diharapkan dengan adanya bimtek ini, kesalahan administratif dalam laporan keuangan daerah dapat diminimalkan serta mempercepat proses pencairan anggaran belanja daerah.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Evaluasi Laporan Keuangan Pemerintah Daerah Oleh BPKAD',
                'type_article' => 2,
                'description' => '<p>BPKAD melakukan evaluasi berkala terhadap Laporan Keuangan Pemerintah Daerah (LKPD). Evaluasi ini bertujuan untuk mengukur kepatuhan OPD terhadap regulasi akuntansi pemerintah yang berlaku.</p><p>Hasil evaluasi menunjukkan adanya peningkatan kualitas penyusunan laporan keuangan dibanding tahun sebelumnya.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Strategi BPKAD dalam Meningkatkan Pendapatan Asli Daerah (PAD)',
                'type_article' => 2,
                'description' => '<p>Dalam rangka mengoptimalkan Pendapatan Asli Daerah (PAD), BPKAD merumuskan beberapa strategi baru yang berfokus pada digitalisasi pemungutan pajak daerah dan retribusi daerah.</p><p>Langkah ini diharapkan dapat mempermudah wajib pajak dalam membayar kewajiban mereka secara aman dan transparan.</p>',
                'is_highline' => true,
            ],
            [
                'title' => 'BPKAD Lakukan Inventarisasi Aset Daerah Secara Digital',
                'type_article' => 2,
                'description' => '<p>BPKAD kini resmi meluncurkan aplikasi digital terintegrasi untuk pencatatan dan inventarisasi aset daerah. Langkah modernisasi ini bertujuan mempercepat verifikasi data aset di lapangan.</p><p>Setiap aset daerah kini dilengkapi dengan kode respon cepat (QR Code) untuk kemudahan pelacakan posisi dan kondisi fisik aset.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Penyusunan Rencana Kerja dan Anggaran (RKA) BPKAD Periode Terbaru',
                'type_article' => 2,
                'description' => '<p>BPKAD mengadakan rapat pleno penyusunan Rencana Kerja dan Anggaran (RKA) untuk tahun anggaran mendatang. Fokus pembahasan adalah alokasi prioritas pembangunan infrastruktur dan pemulihan ekonomi.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Optimalkan Penggunaan E-Katalog untuk Pengadaan Barang dan Jasa',
                'type_article' => 2,
                'description' => '<p>Guna menciptakan proses pengadaan barang dan jasa yang bersih dan transparan, BPKAD terus mendorong penggunaan sistem e-Katalog lokal.</p><p>Melalui sistem ini, pelaku UMKM daerah memiliki kesempatan yang sama untuk bermitra dengan pemerintah daerah.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Peningkatan Kapasitas SDM BPKAD Melalui Pelatihan SPIP',
                'type_article' => 2,
                'description' => '<p>Penerapan Sistem Pengendalian Intern Pemerintah (SPIP) di lingkungan BPKAD terus diperkuat melalui pelatihan intensif bagi pegawai internal.</p><p>Tujuannya adalah mengidentifikasi dan meminimalkan risiko operasional keuangan daerah sejak dini.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Dukung Implementasi Sistem Informasi Pemerintahan Daerah (SIPD)',
                'type_article' => 2,
                'description' => '<p>BPKAD berkomitmen mendukung penuh migrasi dan integrasi data keuangan ke dalam aplikasi Sistem Informasi Pemerintahan Daerah (SIPD) yang diinisiasi oleh Kemendagri.</p>',
                'is_highline' => true,
            ],
            [
                'title' => 'Rapat Koordinasi Pengawasan Realisasi Anggaran Triwulan I',
                'type_article' => 2,
                'description' => '<p>Rakor pengawasan realisasi anggaran triwulan pertama dilaksanakan guna mengidentifikasi hambatan administratif yang dialami oleh beberapa instansi daerah.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Link Pendaftaran Pelatihan Pengelolaan Keuangan Daerah',
                'type_article' => 1,
                'description' => 'https://bpkad.go.id/pendaftaran-pelatihan-keuangan',
                'is_highline' => false,
            ],
            [
                'title' => 'Monitoring dan Evaluasi Penggunaan Aset Kendaraan Dinas',
                'type_article' => 2,
                'description' => '<p>BPKAD kembali melakukan monitoring dan evaluasi kelayakan serta penggunaan aset kendaraan dinas operasional. Langkah ini diambil untuk memastikan efisiensi konsumsi bahan bakar dan perawatan rutin.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Raih Penghargaan Pengelolaan Keuangan Terbaik Tingkat Provinsi',
                'type_article' => 2,
                'description' => '<p>Atas konsistensi dalam menjaga akuntabilitas, BPKAD mendapatkan penghargaan tingkat provinsi dalam kategori transparansi laporan keuangan terbaik.</p>',
                'is_highline' => true,
            ],
            [
                'title' => 'Kunjungan Kerja Komisi III DPRD Terkait Pembahasan Aset Daerah',
                'type_article' => 2,
                'description' => '<p>Anggota Komisi III DPRD melakukan kunjungan kerja ke kantor BPKAD untuk membahas strategi penertiban sertifikasi tanah milik daerah yang belum terselesaikan.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Terapkan Pembayaran Non-Tunai untuk Transaksi Pemerintah Daerah',
                'type_article' => 2,
                'description' => '<p>Sebagai bagian dari komitmen Smart City, BPKAD mulai menerapkan kebijakan transaksi non-tunai secara menyeluruh di lingkungan sekretariat daerah.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Sinergi BPKAD dan BPK RI dalam Pemeriksaan Laporan Keuangan',
                'type_article' => 2,
                'description' => '<p>Pertemuan koordinasi antara BPKAD dan tim pemeriksa BPK RI dilakukan sebagai tahap awal audit atas Laporan Keuangan Pemerintah Daerah (LKPD).</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Lakukan Penataan Arsip Keuangan Guna Wujudkan Transparansi',
                'type_article' => 2,
                'description' => '<p>Penyimpanan dan digitalisasi arsip dokumen transaksi keuangan masa lalu kini menjadi salah satu prioritas pelayanan publik BPKAD.</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Unduh Dokumen Regulasi Pajak Daerah Terbaru',
                'type_article' => 1,
                'description' => 'https://bpkad.go.id/dokumen-regulasi-pajak-2026',
                'is_highline' => false,
            ],
            [
                'title' => 'BPKAD Canangkan Program Efisiensi Belanja Operasional Kantor',
                'type_article' => 2,
                'description' => '<p>Sebagai respon atas arahan pengetatan anggaran belanja negara, BPKAD memulai kebijakan penghematan pemakaian listrik dan kertas (paperless).</p>',
                'is_highline' => false,
            ],
            [
                'title' => 'Upaya BPKAD dalam Penertiban Sertifikasi Tanah Kas Desa dan Aset Daerah',
                'type_article' => 2,
                'description' => '<p>Langkah preventif pengamanan aset hukum terus ditingkatkan oleh BPKAD bekerja sama dengan Badan Pertanahan Nasional (BPN).</p>',
                'is_highline' => true,
            ],
        ];

        foreach ($articles as $index => $data) {
            // Set dummy cover image
            $coverPath = '/assets/article/dummy-' . ($index + 1) . '.jpg';

            Article::create([
                'title'        => $data['title'],
                'cover'        => $coverPath,
                'is_highline'  => $data['is_highline'],
                'type_article' => $data['type_article'],
                'description'  => $data['description'],
                'slug'         => Str::slug($data['title']),
                'date'         => Carbon::now()->subDays(20 - $index)->format('Y-m-d'),
                'author_id'    => $author->id,
            ]);
        }
    }
}
