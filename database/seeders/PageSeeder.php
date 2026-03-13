<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first(); // Get first user as creator

        $pages = [
            [
                'title' => 'Welcome to Solviera',
                'slug' => 'home',
                'page_type' => 'home',
                'excerpt' => 'Solusi terbaik untuk kebutuhan digital bisnis Anda',
                'content' => '<h1>Selamat Datang di Solviera</h1>
                <p>Kami adalah perusahaan yang fokus pada solusi digital inovatif untuk membantu bisnis Anda berkembang di era digital. Dengan pengalaman lebih dari 10 tahun, kami telah membantu ratusan klien mencapai tujuan bisnis mereka.</p>
                <h2>Mengapa Memilih Kami?</h2>
                <ul>
                    <li>Tim profesional dan berpengalaman</li>
                    <li>Solusi yang disesuaikan dengan kebutuhan bisnis Anda</li>
                    <li>Dukungan pelanggan 24/7</li>
                    <li>Teknologi terkini dan terpercaya</li>
                </ul>',
                'meta_title' => 'Solviera - Solusi Digital Terpercaya',
                'meta_description' => 'Solviera menyediakan solusi digital terpercaya untuk kebutuhan bisnis Anda. Hubungi kami sekarang!',
                'meta_keywords' => 'solviera, solusi digital, web development, aplikasi, teknologi',
                'status' => 'published',
                'order' => 1,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'page_type' => 'about',
                'excerpt' => 'Kenali lebih jauh tentang perjalanan dan visi misi Solviera',
                'content' => '<h1>Tentang Kami</h1>
                <p>Solviera didirikan pada tahun 2014 dengan visi untuk menjadi mitra terpercaya dalam transformasi digital bagi perusahaan di Indonesia. Kami percaya bahwa teknologi dapat memberdayakan bisnis untuk mencapai potensi maksimal mereka.</p>

                <h2>Visi Kami</h2>
                <p>Menjadi perusahaan solusi digital terdepan di Indonesia yang membantu bisnis bertransformasi dan berkembang di era digital.</p>

                <h2>Misi Kami</h2>
                <ul>
                    <li>Memberikan solusi digital berkualitas tinggi yang disesuaikan dengan kebutuhan klien</li>
                    <li>Membangun kemitraan jangka panjang dengan klien</li>
                    <li>Terus berinovasi dan mengadopsi teknologi terkini</li>
                    <li>Mengembangkan tim profesional yang kompeten dan berdedikasi</li>
                </ul>

                <h2>Tim Kami</h2>
                <p>Kami memiliki tim yang terdiri dari para profesional berpengalaman di bidang teknologi, desain, dan bisnis. Setiap anggota tim kami berdedikasi untuk memberikan hasil terbaik bagi klien.</p>',
                'meta_title' => 'Tentang Solviera - Solusi Digital Terpercaya',
                'meta_description' => 'Pelajari lebih lanjut tentang Solviera, visi, misi, dan tim kami yang berdedikasi untuk memberikan solusi digital terbaik.',
                'meta_keywords' => 'tentang solviera, visi misi, tim solviera, perusahaan digital',
                'status' => 'published',
                'order' => 2,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Our Services',
                'slug' => 'services',
                'page_type' => 'services',
                'excerpt' => 'Layanan komprehensif untuk mendukung transformasi digital bisnis Anda',
                'content' => '<h1>Layanan Kami</h1>
                <p>Solviera menyediakan berbagai layanan untuk membantu bisnis Anda bertransformasi secara digital:</p>

                <h2>Web Development</h2>
                <p>Kami membuat website profesional yang responsif, cepat, dan SEO-friendly. Dari landing page hingga aplikasi web kompleks, kami siap membantu Anda.</p>

                <h2>Mobile App Development</h2>
                <p>Kembangkan aplikasi mobile untuk iOS dan Android dengan fitur yang disesuaikan dengan kebutuhan bisnis Anda.</p>

                <h2>UI/UX Design</h2>
                <p>Desain antarmuka yang menarik dan user experience yang optimal untuk meningkatkan kepuasan pengguna.</p>

                <h2>Digital Marketing</h2>
                <p>Strategi pemasaran digital yang efektif untuk meningkatkan visibilitas dan konversi bisnis Anda.</p>

                <h2>Cloud Solutions</h2>
                <p>Migrasi dan pengelolaan infrastruktur cloud untuk meningkatkan skalabilitas dan efisiensi bisnis Anda.</p>

                <h2>IT Consulting</h2>
                <p>Konsultasi teknologi untuk membantu Anda membuat keputusan strategis dalam transformasi digital.</p>',
                'meta_title' => 'Layanan Kami - Solusi Digital Lengkap',
                'meta_description' => 'Jelajahi berbagai layanan digital yang kami tawarkan: web development, mobile apps, UI/UX design, dan banyak lagi.',
                'meta_keywords' => 'layanan digital, web development, mobile app, UI/UX, digital marketing, cloud',
                'status' => 'published',
                'order' => 3,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Our Projects',
                'slug' => 'projects',
                'page_type' => 'projects',
                'excerpt' => 'Portfolio proyek-proyek sukses yang telah kami kerjakan',
                'content' => '<h1>Portfolio Kami</h1>
                <p>Berikut adalah beberapa proyek yang telah kami kerjakan dengan sukses:</p>

                <h2>E-Commerce Platform XYZ</h2>
                <p>Platform e-commerce lengkap dengan sistem pembayaran terintegrasi, manajemen inventory, dan dashboard analytics. Membantu klien meningkatkan penjualan online hingga 300%.</p>

                <h2>Corporate Website ABC Corp</h2>
                <p>Website corporate modern dengan CMS custom, multi-language support, dan optimasi SEO. Meningkatkan traffic organik hingga 250%.</p>

                <h2>Mobile Banking App</h2>
                <p>Aplikasi mobile banking dengan fitur transfer, pembayaran tagihan, dan investasi. Telah diunduh lebih dari 1 juta pengguna.</p>

                <h2>Learning Management System</h2>
                <p>Platform pembelajaran online dengan fitur video streaming, quiz, dan sertifikat. Digunakan oleh lebih dari 10,000 siswa.</p>

                <h2>Inventory Management System</h2>
                <p>Sistem manajemen inventory berbasis cloud dengan real-time tracking dan reporting. Membantu klien mengurangi biaya operasional 40%.</p>',
                'meta_title' => 'Portfolio Proyek Kami - Solviera',
                'meta_description' => 'Lihat portfolio proyek-proyek digital yang telah kami kerjakan dengan sukses untuk berbagai klien.',
                'meta_keywords' => 'portfolio, proyek digital, case study, web project, app project',
                'status' => 'published',
                'order' => 4,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Blog & Articles',
                'slug' => 'blog',
                'page_type' => 'blog',
                'excerpt' => 'Artikel dan tips seputar teknologi dan transformasi digital',
                'content' => '<h1>Blog Solviera</h1>
                <p>Baca artikel terbaru kami tentang teknologi, tips pengembangan, dan tren digital:</p>

                <h2>Artikel Terbaru</h2>

                <h3>5 Tren Web Development di 2026</h3>
                <p>Pelajari tren terkini dalam pengembangan web yang akan mendominasi industri tahun ini.</p>

                <h3>Cara Meningkatkan Keamanan Website Anda</h3>
                <p>Tips praktis untuk melindungi website dari serangan cyber dan menjaga data pengguna tetap aman.</p>

                <h3>Mengapa Bisnis Anda Perlu Mobile App?</h3>
                <p>Eksplorasi manfaat memiliki aplikasi mobile untuk bisnis di era digital saat ini.</p>

                <h3>Panduan Lengkap UI/UX Design untuk Pemula</h3>
                <p>Mulai perjalanan Anda dalam dunia desain antarmuka dengan panduan komprehensif ini.</p>

                <h3>Cloud Computing: Solusi untuk Bisnis Modern</h3>
                <p>Ketahui bagaimana cloud computing dapat meningkatkan efisiensi dan skalabilitas bisnis Anda.</p>',
                'meta_title' => 'Blog Solviera - Artikel Teknologi & Digital',
                'meta_description' => 'Baca artikel dan tips terbaru seputar teknologi, web development, mobile apps, dan transformasi digital.',
                'meta_keywords' => 'blog teknologi, artikel digital, tips web development, tren teknologi',
                'status' => 'published',
                'order' => 5,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Gallery',
                'slug' => 'gallery',
                'page_type' => 'gallery',
                'excerpt' => 'Galeri foto kegiatan, acara, dan suasana kantor Solviera',
                'content' => '<h1>Galeri Solviera</h1>
                <p>Lihat momen-momen penting dan suasana kerja di Solviera:</p>

                <h2>Tim & Workspace</h2>
                <p>Suasana kerja yang kolaboratif dan menyenangkan di kantor Solviera.</p>

                <h2>Client Meetings</h2>
                <p>Foto-foto dari pertemuan dengan klien dan presentasi proyek.</p>

                <h2>Team Building</h2>
                <p>Kegiatan team building dan outing bersama tim Solviera.</p>

                <h2>Tech Events</h2>
                <p>Partisipasi kami dalam berbagai acara teknologi dan workshop.</p>

                <h2>Office Events</h2>
                <p>Perayaan milestone, ulang tahun perusahaan, dan acara spesial lainnya.</p>',
                'meta_title' => 'Galeri Solviera - Foto & Kegiatan',
                'meta_description' => 'Lihat galeri foto kegiatan, tim, dan suasana kerja di Solviera.',
                'meta_keywords' => 'galeri solviera, foto kantor, team building, acara teknologi',
                'status' => 'published',
                'order' => 6,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Frequently Asked Questions',
                'slug' => 'faqs',
                'page_type' => 'faqs',
                'excerpt' => 'Jawaban untuk pertanyaan yang sering diajukan tentang layanan kami',
                'content' => '<h1>FAQ - Pertanyaan yang Sering Diajukan</h1>

                <h2>Umum</h2>

                <h3>Apa itu Solviera?</h3>
                <p>Solviera adalah perusahaan yang menyediakan solusi digital komprehensif, termasuk web development, mobile apps, UI/UX design, dan konsultasi IT.</p>

                <h3>Di mana lokasi kantor Solviera?</h3>
                <p>Kantor utama kami berlokasi di Jakarta, Indonesia. Kami juga melayani klien dari seluruh Indonesia dan mancanegara.</p>

                <h2>Layanan</h2>

                <h3>Berapa lama waktu yang dibutuhkan untuk membuat website?</h3>
                <p>Waktu pengerjaan bervariasi tergantung kompleksitas proyek. Website sederhana dapat selesai dalam 2-4 minggu, sementara proyek kompleks membutuhkan 2-3 bulan.</p>

                <h3>Apakah ada biaya maintenance setelah proyek selesai?</h3>
                <p>Ya, kami menawarkan paket maintenance bulanan atau tahunan untuk memastikan website/aplikasi Anda tetap berjalan optimal.</p>

                <h3>Apakah Solviera menyediakan layanan hosting?</h3>
                <p>Ya, kami menyediakan layanan hosting yang reliable dengan uptime 99.9% dan support 24/7.</p>

                <h2>Pembayaran</h2>

                <h3>Bagaimana sistem pembayaran di Solviera?</h3>
                <p>Kami menggunakan sistem pembayaran bertahap: 30% di awal, 40% saat development, dan 30% setelah selesai. Untuk proyek besar, term dapat disesuaikan.</p>

                <h3>Metode pembayaran apa saja yang diterima?</h3>
                <p>Kami menerima transfer bank, virtual account, dan kartu kredit melalui payment gateway resmi.</p>',
                'meta_title' => 'FAQ Solviera - Pertanyaan yang Sering Diajukan',
                'meta_description' => 'Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan, pembayaran, dan proses kerja di Solviera.',
                'meta_keywords' => 'faq solviera, pertanyaan umum, tanya jawab, informasi layanan',
                'status' => 'published',
                'order' => 7,
                'created_by' => $admin?->id,
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'page_type' => 'contact',
                'excerpt' => 'Hubungi kami untuk konsultasi gratis dan diskusi proyek Anda',
                'content' => '<h1>Hubungi Kami</h1>
                <p>Kami siap membantu mewujudkan ide digital Anda. Hubungi kami untuk konsultasi gratis!</p>

                <h2>Informasi Kontak</h2>

                <h3>Alamat Kantor</h3>
                <p>Jl. Sudirman No. 123<br>
                Jakarta Selatan 12190<br>
                Indonesia</p>

                <h3>Telepon</h3>
                <p>+62 21 1234 5678<br>
                +62 812 3456 7890 (WhatsApp)</p>

                <h3>Email</h3>
                <p>info@solviera.com<br>
                sales@solviera.com<br>
                support@solviera.com</p>

                <h3>Jam Operasional</h3>
                <p>Senin - Jumat: 09.00 - 18.00 WIB<br>
                Sabtu: 09.00 - 14.00 WIB<br>
                Minggu & Tanggal Merah: Tutup</p>

                <h2>Media Sosial</h2>
                <p>Ikuti kami di media sosial untuk update terbaru:</p>
                <ul>
                    <li>Instagram: @solviera</li>
                    <li>LinkedIn: Solviera Indonesia</li>
                    <li>Twitter: @solviera</li>
                    <li>Facebook: Solviera</li>
                </ul>

                <h2>Formulir Kontak</h2>
                <p>Isi formulir di bawah ini dan tim kami akan menghubungi Anda dalam 1x24 jam.</p>',
                'meta_title' => 'Kontak Solviera - Hubungi Kami',
                'meta_description' => 'Hubungi Solviera untuk konsultasi gratis. Alamat, telepon, email, dan jam operasional kami.',
                'meta_keywords' => 'kontak solviera, hubungi kami, alamat kantor, telepon, email',
                'status' => 'published',
                'order' => 8,
                'created_by' => $admin?->id,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }

        $this->command->info('✓ Successfully seeded ' . count($pages) . ' pages');
    }
}
