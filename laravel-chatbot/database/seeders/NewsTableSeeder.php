<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        News::truncate();
        
        // Data dummy berita
        $news = [
            [
                'title' => 'Pemerintah Luncurkan Program Bantuan Energi Terbarukan untuk Masyarakat Pedesaan',
                'content' => 'JAKARTA - Kementerian Energi dan Sumber Daya Mineral (ESDM) resmi meluncurkan program bantuan energi terbarukan untuk masyarakat pedesaan di 15 provinsi. Program ini bertujuan untuk mendorong pemanfaatan energi matahari melalui panel surya di daerah-daerah yang belum terjangkau listrik PLN. "Kami menargetkan 500 desa akan menerima bantuan ini sebelum akhir tahun 2025," ujar Menteri ESDM dalam konferensi pers kemarin. Program ini juga diharapkan dapat mendukung target nasional 23% energi terbarukan dalam bauran energi nasional pada tahun 2026.',
                'category' => 'politik',
                'source' => 'Kompas',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Startup Lokal Kembangkan Teknologi Kecerdasan Buatan untuk Deteksi Dini Penyakit',
                'content' => 'BANDUNG - Sebuah startup asal Bandung, TechHealth, telah berhasil mengembangkan teknologi kecerdasan buatan (AI) yang mampu mendeteksi risiko penyakit jantung dan stroke melalui analisis foto retina mata. Teknologi ini diklaim memiliki akurasi hingga 95% dan dapat digunakan dengan peralatan sederhana yang terhubung ke smartphone. "Inovasi ini akan membantu masyarakat di daerah terpencil yang sulit mengakses fasilitas kesehatan lengkap," jelas Dr. Adi Pratama, pendiri TechHealth. Startup ini telah mendapatkan pendanaan sebesar Rp 50 miliar dari investor dalam dan luar negeri.',
                'category' => 'teknologi',
                'source' => 'Tempo Digital',
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Peneliti Indonesia Temukan Senyawa Anti-Kanker dari Tanaman Endemik Papua',
                'content' => 'JAYAPURA - Tim peneliti dari Universitas Cenderawasih berhasil mengidentifikasi senyawa bioaktif pada tanaman endemik Papua yang memiliki potensi sebagai obat anti-kanker. Tanaman yang dikenal dengan nama lokal "Buah Merah" ini mengandung senyawa yang dapat menghambat pertumbuhan sel kanker dalam uji laboratorium. "Ini adalah terobosan penting dalam penelitian obat herbal Indonesia," kata Prof. Dr. Mira Saraswati, ketua tim peneliti. Penelitian ini telah dipublikasikan dalam jurnal internasional dan menarik perhatian perusahaan farmasi global untuk melakukan studi lanjutan.',
                'category' => 'kesehatan',
                'source' => 'Republika',
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Kementerian Pendidikan Revisi Kurikulum Nasional dengan Penekanan pada Literasi Digital',
                'content' => 'JAKARTA - Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi mengumumkan revisi kurikulum nasional yang akan mulai diterapkan tahun ajaran 2026. Kurikulum baru ini akan memberikan penekanan lebih besar pada literasi digital dan pemrograman dasar mulai dari tingkat sekolah dasar. "Era digital membutuhkan generasi yang mampu tidak hanya menggunakan teknologi tetapi juga menciptakannya," jelas Menteri Pendidikan dalam rapat koordinasi nasional. Rencana ini mendapat dukungan dari berbagai perusahaan teknologi yang berkomitmen menyediakan pelatihan untuk guru-guru di seluruh Indonesia.',
                'category' => 'pendidikan',
                'source' => 'Detik News',
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Tim Nasional Basket Indonesia Lolos ke Final Kejuaraan Asia Tenggara',
                'content' => 'MANILA - Tim Nasional Basket Indonesia berhasil mengalahkan Thailand dengan skor 88-75 dalam semifinal Kejuaraan Basket Asia Tenggara 2025. Kemenangan ini memastikan Indonesia melaju ke final dan akan bertemu dengan Filipina yang menjadi tuan rumah. "Ini adalah hasil dari kerja keras dan persiapan intensif selama enam bulan terakhir," ujar pelatih kepala Timnas, Wahyu Widayat. Penampilan impresif dari point guard Abraham Damar yang mencetak 28 poin menjadi kunci kemenangan Indonesia. Final akan digelar pada Minggu mendatang di Araneta Coliseum, Manila.',
                'category' => 'olahraga',
                'source' => 'Bola.net',
                'published_at' => Carbon::now()->subDay(),
            ],
            [
                'title' => 'Produksi Film Animasi Indonesia Raih Penghargaan di Festival Internasional',
                'content' => 'ANNECY - Film animasi "Punakawan: Guardians of Wisdom" karya studio animasi asal Yogyakarta berhasil meraih penghargaan Best Original Story dalam Festival Film Animasi Internasional di Annecy, Prancis. Film yang mengangkat cerita wayang dengan teknologi CGI modern ini mengalahkan kandidat-kandidat dari Jepang dan Amerika Serikat. "Ini membuktikan bahwa konten lokal dengan kualitas global dapat bersaing di kancah internasional," kata Denny Wijaya, sutradara film tersebut. Film ini rencananya akan dirilis secara internasional pada akhir tahun ini.',
                'category' => 'hiburan',
                'source' => 'CNN Indonesia',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Bank Indonesia Luncurkan Mata Uang Digital Resmi Tahun Depan',
                'content' => 'JAKARTA - Bank Indonesia (BI) mengumumkan akan meluncurkan rupiah digital atau Central Bank Digital Currency (CBDC) pada kuartal kedua 2026. Mata uang digital ini akan menggunakan teknologi blockchain dengan modifikasi untuk menjamin keamanan dan ketahanan sistem. "Rupiah digital akan melengkapi ekosistem keuangan digital Indonesia yang terus berkembang," jelas Gubernur BI dalam konferensi pers kemarin. Tahap uji coba terbatas telah dilakukan sejak awal tahun 2025 dengan melibatkan beberapa bank besar dan perusahaan fintech nasional.',
                'category' => 'ekonomi',
                'source' => 'Bisnis Indonesia',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Penemuan Spesies Katak Langka di Hutan Lindung Kalimantan',
                'content' => 'PALANGKARAYA - Tim peneliti gabungan dari Indonesia dan Belanda menemukan spesies katak langka yang belum pernah didokumentasikan sebelumnya di kawasan hutan lindung Kalimantan Tengah. Katak yang diberi nama ilmiah "Rhacophorus kalimanensis" ini memiliki kemampuan unik beradaptasi dengan perubahan suhu ekstrem. "Penemuan ini menunjukkan betapa kaya dan belum tereksplorasi biodiversitas Indonesia," kata Dr. Siti Nurjanah, ketua tim peneliti dari LIPI. Spesies baru ini diperkirakan telah ada selama jutaan tahun dan kini masuk dalam daftar prioritas konservasi.',
                'category' => 'lingkungan',
                'source' => 'National Geographic Indonesia',
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Kota Surabaya Implementasikan Sistem Transportasi Cerdas untuk Atasi Kemacetan',
                'content' => 'SURABAYA - Pemerintah Kota Surabaya mulai mengimplementasikan Sistem Transportasi Cerdas (ITS) yang terintegrasi dengan aplikasi mobile untuk mengatasi kemacetan di jalan-jalan utama. Sistem ini menggabungkan data dari CCTV, sensor lalu lintas, dan kontribusi pengguna jalan untuk mengoptimalkan durasi lampu lalu lintas secara real-time. "Dalam uji coba selama tiga bulan, kami melihat penurunan waktu tempuh hingga 22% pada jam sibuk," kata Kepala Dinas Perhubungan Kota Surabaya. Program ini juga mencakup integrasi dengan layanan transportasi umum untuk mendorong penggunaan angkutan massal.',
                'category' => 'teknologi',
                'source' => 'Jawa Pos',
                'published_at' => Carbon::now()->subDays(6),
            ],
            [
                'title' => 'Festival Kuliner Nusantara Digelar Serentak di 10 Kota Besar',
                'content' => 'JAKARTA - Kementerian Pariwisata dan Ekonomi Kreatif menyelenggarakan Festival Kuliner Nusantara secara serentak di 10 kota besar Indonesia mulai pekan depan. Festival yang berlangsung selama dua minggu ini akan menampilkan lebih dari 500 UMKM kuliner dari berbagai daerah. "Ini adalah bagian dari upaya pemulihan sektor pariwisata dan ekonomi kreatif pasca-pandemi," jelas Menteri Pariwisata dan Ekonomi Kreatif. Event ini diharapkan dapat menarik 1 juta pengunjung dan menghasilkan transaksi hingga Rp 100 miliar.',
                'category' => 'budaya',
                'source' => 'Liputan6',
                'published_at' => Carbon::now()->subDay(),
            ],
        ];
        
        // Masukkan data ke database
        foreach ($news as $item) {
            News::create($item);
        }
    }
}
