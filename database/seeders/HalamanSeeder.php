<?php

namespace Database\Seeders;

use App\Models\Halaman;
use Illuminate\Database\Seeder;

class HalamanSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            // -------------------------------------------------------
            // 1. Sejarah — slug harus sama dengan route /sejarah
            // -------------------------------------------------------
            [
                'judul'     => 'Sejarah YALI Papua',
                'slug'      => 'sejarah',
                'keterangan'=> 'Perjalanan YALI Papua sejak 1988 dalam mendampingi masyarakat adat Papua',
                'urutan'    => 1,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-center mb-10">
            <img src="https://placehold.co/600x400" alt="Ilustrasi Sejarah YALI Papua" class="rounded-lg shadow-card max-w-lg w-full h-auto">
        </div>
        <div class="grid md:grid-cols-2 gap-16 items-start">
            <div class="fade-in">
                <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-leaf mr-2"></i>Tentang Kami</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Perjalanan YALI Papua</h2>
                <div class="space-y-5 text-neutral-600 leading-relaxed">
                    <p>Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua (YALI Papua) adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat.</p>
                    <p>Didirikan pada tahun <strong>1988</strong> dengan nama Yayasan Pendidikan Hukum Masyarakat Adat (YKPHMA) Irian Jaya, oleh Ibu Maria Ruwiastuti, Zadrak Wamebu, Dr. Loupaty, dan beberapa pendiri lainnya — sebagai respons atas kondisi HAM masyarakat adat yang semakin tertindas di Papua.</p>
                    <p>Sejak awal berdirinya, YALI Papua berkomitmen menempatkan masyarakat adat Papua sebagai <em>subjek</em> — bukan objek — dalam proses pembangunan. Lembaga ini hadir sebagai jembatan informasi dan agen perubahan bagi masyarakat dalam mempertahankan hak-hak mereka atas tanah dan sumber daya alam.</p>
                    <p>Selama lebih dari tiga dekade, YALI Papua telah mendampingi masyarakat adat di berbagai wilayah Papua, termasuk Kabupaten Jayapura, Kabupaten Sarmi, dan Kabupaten Mappi.</p>
                </div>
            </div>
            <div class="fade-in">
                <h3 class="text-xl font-display font-bold text-neutral-900 mb-8">Tonggak Sejarah</h3>
                <div class="relative border-l-2 border-secondary/30 pl-8 space-y-8">
                    <div class="relative fade-in">
                        <div class="absolute -left-10 w-4 h-4 rounded-full bg-secondary/100 border-2 border-white shadow"></div>
                        <span class="inline-block text-xs font-bold bg-secondary/10 text-secondary px-3 py-1 mb-2">1988</span>
                        <h4 class="font-display font-bold text-neutral-900">Pendirian YKPHMA</h4>
                        <p class="text-neutral-500 text-sm mt-1">Didirikan dengan nama Yayasan Pendidikan Hukum Masyarakat Adat (YKPHMA) Irian Jaya oleh Maria Ruwiastuti, Zadrak Wamebu, dan Dr. Loupaty.</p>
                    </div>
                    <div class="relative fade-in">
                        <div class="absolute -left-10 w-4 h-4 rounded-full bg-secondary/100 border-2 border-white shadow"></div>
                        <span class="inline-block text-xs font-bold bg-secondary/10 text-secondary px-3 py-1 mb-2">1997</span>
                        <h4 class="font-display font-bold text-neutral-900">Akta Pendirian Resmi</h4>
                        <p class="text-neutral-500 text-sm mt-1">Akta pendirian resmi YALI Papua ditandatangani pada 31 Oktober 1997.</p>
                    </div>
                    <div class="relative fade-in">
                        <div class="absolute -left-10 w-4 h-4 rounded-full bg-secondary/100 border-2 border-white shadow"></div>
                        <span class="inline-block text-xs font-bold bg-secondary/10 text-secondary px-3 py-1 mb-2">2020</span>
                        <h4 class="font-display font-bold text-neutral-900">Periode Kerja Baru</h4>
                        <p class="text-neutral-500 text-sm mt-1">Memasuki periode kerja 2020–2025 dengan 5 pilar program strategis: PMA, KPP, PEMA, PPA, dan PISD.</p>
                    </div>
                    <div class="relative fade-in">
                        <div class="absolute -left-10 w-4 h-4 rounded-full bg-secondary/100 border-2 border-white shadow"></div>
                        <span class="inline-block text-xs font-bold bg-secondary/10 text-secondary px-3 py-1 mb-2">2025</span>
                        <h4 class="font-display font-bold text-neutral-900">Penguatan Kelembagaan</h4>
                        <p class="text-neutral-500 text-sm mt-1">Melanjutkan penguatan kapasitas kelembagaan dan program pemberdayaan masyarakat adat di 7 wilayah adat Tanah Papua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
HTML,
            ],

            // -------------------------------------------------------
            // 2. Profil — slug sama dengan route /profil
            //    Mencakup: visi/misi/wilayah + direktur + identitas
            // -------------------------------------------------------
            [
                'judul'     => 'Profil Organisasi',
                'slug'      => 'profil',
                'keterangan'=> 'Profil, visi, misi, dan identitas lembaga YALI Papua',
                'urutan'    => 2,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-center mb-10">
            <img src="https://placehold.co/600x400" alt="Ilustrasi Profil Organisasi YALI Papua" class="rounded-lg shadow-card max-w-lg w-full h-auto">
        </div>
        <div class="max-w-3xl mx-auto text-center fade-in">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-building mr-2"></i>Organisasi</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Tentang YALI Papua</h2>
            <p class="text-neutral-600 leading-relaxed mb-4">Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua (YALI Papua) adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat, berkaitan dengan kepastian hak dan ruang hidupnya untuk kemandirian dan kesejahteraannya.</p>
            <p class="text-neutral-600 leading-relaxed">Berbasis di Jayapura, lembaga ini bekerja di beberapa kabupaten di Provinsi Papua dan Papua Selatan dengan fokus pada pengorganisasian masyarakat adat, advokasi kebijakan, pengembangan ekonomi, dan penguatan perempuan adat.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center fade-in">
            <div class="w-14 h-14 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-eye text-secondary text-2xl"></i></div>
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2">Arah Organisasi</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Visi</h2>
            <p class="text-neutral-600 leading-relaxed text-lg">Terwujudnya Masyarakat Adat Papua Yang Mampu Mengorganisir Diri Dan Merekonsiliasi Hubungan Dengan Tuhan Dan Alam Semesta Papua Untuk Kehidupan Yang Berdaulat Dan Berkelanjutan Dalam Berbagai Aspek Kehidupan Di Tahun 2040.</p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-10 fade-in">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-bullseye mr-2"></i>Langkah Strategis</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Misi</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-pray text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">Rekon</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Mendorong rekonsiliasi (nilai, norma, spirit) hubungan antara Manusia dengan Tuhan dan Alam Semesta</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-map-location-dot text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">PMA</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Terorganisir dan menguatnya kapasitas kelembagaan Masyarakat Adat dalam rangka menentukan posisi strategis yang kuat untuk meningkatkan posisi tawarnya dalam aspek ekosob dan sipol menuju kemandirian dan keberlanjutan hidup pada 7 wilayah adat di Tanah Papua</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-scale-balanced text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">KPP</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Melakukan Kajian dan Advokasi Kebijakan yang membatasi ruang, akses dan control Hak-Hak Dasar Ekosob dan Sipol Masyarakat Adat pada 7 wilayah Adat di Tanah Papua</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-users-gear text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">PPA</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Menguatnya Posisi perempuan adat dalam mengembangkan potensi diri guna keberlanjutan hidup komunitas Adat di Tanah Papua</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-seedling text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">PEMA</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Mengelola potensi SDA dalam rangka pemberdayaan dan pengembangan Ekosob berbasiskan Masyarakat adat Papua</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-building-circle-check text-secondary text-xl"></i></div>
                <h4 class="font-display font-bold text-neutral-900 mb-2">PISD</h4>
                <p class="text-neutral-500 text-sm leading-relaxed">Meningkatnya kapasitas dan kemandirian YALI Papua dalam menyediakan sumber daya yang memadai guna mendukung pelaksanaan program dan operasional dalam menjamin keberlangsungan lembaga demi tercapainya visi dan misi Perkumpulan</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-10 fade-in">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-heart mr-2"></i>Prinsip Kami</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Nilai Organisasi</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-eye text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Transparansi</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-people-group text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Demokrasi</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-venus-mars text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Kesetaraan Gender</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-hands-holding-circle text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Partisipasi</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-arrows-spin text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Keberlanjutan</p>
            </div>
            <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-6 text-center shadow-card fade-in hover:border-secondary/30 transition">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-leaf text-secondary text-xl"></i></div>
                <p class="font-display font-bold text-neutral-900">Kelestarian</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12 fade-in">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-id-card mr-2"></i>Data</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Identitas Lembaga</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-building text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Nama Resmi</p>
                <p class="font-semibold text-neutral-900">Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua (YALI Papua)</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-signature text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Singkatan</p>
                <p class="font-semibold text-neutral-900">YALI Papua</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-calendar-days text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Tahun Berdiri</p>
                <p class="font-semibold text-neutral-900">1988</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-sitemap text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Jenis Organisasi</p>
                <p class="font-semibold text-neutral-900">LSM / NGO Nirlaba</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-location-dot text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Kantor Pusat</p>
                <p class="font-semibold text-neutral-900">Jayapura, Papua</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-card fade-in text-center">
                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center mx-auto mb-4"><i class="fa-solid fa-bullseye text-secondary text-xl"></i></div>
                <p class="text-xs text-neutral-400 uppercase tracking-wider mb-1">Bidang Fokus</p>
                <p class="font-semibold text-neutral-900">Pengkajian dan Pemberdayaan Masyarakat Adat Papua</p>
            </div>
        </div>
    </div>
</section>
HTML,
            ],

            // -------------------------------------------------------
            // 3. Program Kerja — slug sama dengan route /bidang-kerja
            // -------------------------------------------------------
            [
                'judul'     => 'Program Kerja',
                'slug'      => 'bidang-kerja',
                'keterangan'=> 'Program kerja strategis YALI Papua dalam pemberdayaan masyarakat adat',
                'urutan'    => 3,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14 fade-in">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-list-check mr-2"></i>Pilar Strategis</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Program Kerja</h2>
            <p class="text-neutral-500 mt-3 max-w-2xl mx-auto">Lima program kerja utama YALI Papua yang dirancang untuk memperkuat posisi dan hak masyarakat adat di Tanah Papua.</p>
        </div>

        <div class="space-y-8">
            <div class="rounded-lg overflow-hidden bg-neutral-50 border border-neutral-100 shadow-card fade-in">
                <div class="grid md:grid-cols-3 gap-0">
                    <div class="bg-secondary/100 p-8 flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white/20 flex items-center justify-center mb-4"><i class="fa-solid fa-map-location-dot text-white text-xl"></i></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mb-1">A</span>
                        <h3 class="text-xl font-display font-bold text-white">Penguatan Masyarakat Adat</h3>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mt-2">PMA</span>
                    </div>
                    <div class="md:col-span-2 p-8">
                        <p class="text-neutral-600 leading-relaxed">Pengorganisasian MA, Penguatan kelembagaan Adat, Pendidikan dan Pelatihan-pelatihan, Pemetaan Wilayah Adat, Kajian Sosial Budaya, Survey Potensi Ekonomi untuk pengembangan usaha mikro, Perencanaan Wilayah untuk memastikan ruang-ruang pemanfaatan ekonomi, pemukiman, pembangunan serta peruntukan lainnya dengan tetap menjaga keseimbangan alam dalam upaya adaptasi dan mitigasi secara inclusive berdasarkan nilai-nilai kearifan lokal dalam menghadapi perubahan iklim.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg overflow-hidden bg-neutral-50 border border-neutral-100 shadow-card fade-in">
                <div class="grid md:grid-cols-3 gap-0">
                    <div class="bg-secondary/100 p-8 flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white/20 flex items-center justify-center mb-4"><i class="fa-solid fa-scale-balanced text-white text-xl"></i></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mb-1">B</span>
                        <h3 class="text-xl font-display font-bold text-white">Kajian Pendidikan Publik</h3>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mt-2">KPP</span>
                    </div>
                    <div class="md:col-span-2 p-8">
                        <p class="text-neutral-600 leading-relaxed">Kajian berbagai aturan perundang-undangan yang terkait dengan masyarakat adat, melakukan Pendataan berbagai Investasi, Survey dan Investigasi terhadap Konflik Investasi dan Pembangunan, Membangun Sistim Informasi data, Pengembangan Media publikasi dan Jaringan, Kampanye dan Advokasi, Mendorong Kebijakan Daerah yang melindungi Hak dan Keberadaan Masyarakat Adat.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg overflow-hidden bg-neutral-50 border border-neutral-100 shadow-card fade-in">
                <div class="grid md:grid-cols-3 gap-0">
                    <div class="bg-secondary/100 p-8 flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white/20 flex items-center justify-center mb-4"><i class="fa-solid fa-seedling text-white text-xl"></i></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mb-1">C</span>
                        <h3 class="text-xl font-display font-bold text-white">Pengembangan Ekonomi Masyarakat Adat</h3>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mt-2">PEMA</span>
                    </div>
                    <div class="md:col-span-2 p-8">
                        <p class="text-neutral-600 leading-relaxed">Penataan Bentuk-bentuk Kelembagaan Ekonomi, Pengembangan Sumber Potensi Ekonomi, Pelatihan Peningkatan Keterampilan Usaha dan Disain Produk, Pengurusan Perijinan Usaha Masyarakat serta mengusahakan Jaringan Pemasaran.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg overflow-hidden bg-neutral-50 border border-neutral-100 shadow-card fade-in">
                <div class="grid md:grid-cols-3 gap-0">
                    <div class="bg-secondary/100 p-8 flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white/20 flex items-center justify-center mb-4"><i class="fa-solid fa-users-gear text-white text-xl"></i></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mb-1">D</span>
                        <h3 class="text-xl font-display font-bold text-white">Penguatan Perempuan Adat</h3>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mt-2">PPA</span>
                    </div>
                    <div class="md:col-span-2 p-8">
                        <p class="text-neutral-600 leading-relaxed">Pemberdayaan kelompok-kelompok perempuan melalui bentuk-bentuk Organisasi Perempuan, Pendidikan dan Pelatihan Gender dan nilai-nilai dan konteks kebudayaan serta Peningkatan Kapasitas melalui berbagai pelatihan, guna memperkuat partisipasi perempuan dalam ruang publik serta tetap menjaga generasi dan masa depan tanah Papua.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg overflow-hidden bg-neutral-50 border border-neutral-100 shadow-card fade-in">
                <div class="grid md:grid-cols-3 gap-0">
                    <div class="bg-secondary/100 p-8 flex flex-col justify-center">
                        <div class="w-12 h-12 bg-white/20 flex items-center justify-center mb-4"><i class="fa-solid fa-building-circle-check text-white text-xl"></i></div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mb-1">E</span>
                        <h3 class="text-xl font-display font-bold text-white">Penguatan Institusi dan Sumber Daya</h3>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/80 mt-2">PISD</span>
                    </div>
                    <div class="md:col-span-2 p-8">
                        <p class="text-neutral-600 leading-relaxed">Penguatan kapasitas kelembagaan YALI melalui peningkatan sumber daya staff, pendataan dan pengelolaan asset, mengefektifkan manajemen sistem dalam internal kelembagaan melalui rapat-rapat internal, Rapat Badan Pengurus dan Rapat Anggota Tahunan, Rapat Umum Anggota, Menyiapkan laporan secara berkala, Monev, Fund Rising dan Memastikan Keberlanjutan Organisasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-neutral-50 border-t border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 text-center fade-in">
        <h2 class="text-xl md:text-2xl font-display font-bold text-neutral-900 mb-3">Ingin Mendukung Program Kami?</h2>
        <p class="text-neutral-500 max-w-lg mx-auto mb-6">Setiap kontribusi membantu mewujudkan kemandirian dan keadilan sosial bagi masyarakat adat Papua.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/donasi" class="bg-secondary/100 text-white px-8 py-3 text-sm font-semibold hover:bg-secondary transition-colors shadow-card">
                <i class="fa-solid fa-heart mr-2"></i>Donasi Sekarang
            </a>
            <a href="/kontak" class="border border-neutral-300 text-neutral-700 px-8 py-3 text-sm font-semibold hover:border-secondary hover:text-secondary transition-colors">
                <i class="fa-solid fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>
HTML,
            ],

            // -------------------------------------------------------
            // 4. Mitra — slug sama dengan route /mitra
            // -------------------------------------------------------
            [
                'judul'     => 'Mitra Kerja & Sponsor',
                'slug'      => 'mitra',
                'keterangan'=> 'Lembaga dan organisasi yang telah bermitra bersama YALI Papua',
                'urutan'    => 4,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-16 fade-in">
            <div class="max-w-xl">
                <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-handshake mr-2"></i>Kemitraan</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-4">Bersama Membangun Papua</h2>
                <p class="text-neutral-600 leading-relaxed">Selama lebih dari 40 tahun, YALI Papua telah menjalin kemitraan strategis dengan berbagai lembaga pemerintah, komunitas adat, dan organisasi non-pemerintah lokal maupun nasional. Kemitraan ini menjadi fondasi keberlanjutan program-program pemberdayaan masyarakat adat di Papua.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-lg bg-secondary/5 border border-secondary/20 p-5 text-center fade-in"><p class="text-3xl font-black text-secondary">49</p><p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">Total Mitra</p></div>
                <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in"><p class="text-3xl font-black text-secondary">4</p><p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">Pemerintah</p></div>
                <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in"><p class="text-3xl font-black text-secondary">12</p><p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">NGO Lokal</p></div>
                <div class="rounded-lg bg-neutral-50 border border-neutral-100 p-5 text-center fade-in"><p class="text-3xl font-black text-secondary">27</p><p class="text-lg font-semibold uppercase tracking-wider text-neutral-600 mt-1">NGO Nasional</p></div>
            </div>
        </div>

        <div class="mb-14">
            <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3"><span class="flex-1 h-px bg-neutral-200"></span><span><i class="fa-solid fa-landmark mr-2 text-secondary/70"></i>Pemerintah</span><span class="flex-1 h-px bg-neutral-200"></span></h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#01</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">Pemerintah</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Menteri Kehutanan</h4><a href="https://www.kehutanan.go.id/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> kehutanan.go.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#02</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">Pemerintah</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Kabupaten Jayapura</h4><a href="https://jayapurakab.go.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> jayapurakab.go.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#03</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">Pemerintah</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Kabupaten Mappi</h4><a href="https://mappikab.go.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> mappikab.go.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#04</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-blue-50 text-blue-600">Pemerintah</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Kabupaten Sarmi</h4><a href="https://www.sarmikab.go.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> sarmikab.go.id</a></div>
            </div>
        </div>

        <div class="mb-14">
            <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3"><span class="flex-1 h-px bg-neutral-200"></span><span><i class="fa-solid fa-users mr-2 text-amber-500/70"></i>Adat &amp; Komunitas</span><span class="flex-1 h-px bg-neutral-200"></span></h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#05</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Adat</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Dewan Adat Suku di Kabupaten Jayapura</h4><p class="text-neutral-500 text-base mt-1">Ada 9 dewan adat suku di Kab. Jayapura</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#06</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Adat</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Dewan Adat Suku di Kabupaten Sarmi</h4><p class="text-neutral-500 text-base mt-1">Ada 5 suku besar di Kabupaten Sarmi</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#07</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Komunitas</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Ikatan Perempuan Mappi</h4></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#08</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Komunitas</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Organisasi Perempuan Adat Namblong</h4><p class="text-neutral-500 text-base mt-1">ORPA Namblong</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#09</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Adat</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">LMA Kabupaten Mappi</h4><p class="text-neutral-500 text-base mt-1">Lembaga Masyarakat Adat Kab. Mappi</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#10</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Adat</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">LMA Kabupaten Sarmi</h4><p class="text-neutral-500 text-base mt-1">Lembaga Masyarakat Adat Kab. Sarmi</p></div>
            </div>
        </div>

        <div class="mb-14">
            <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3"><span class="flex-1 h-px bg-neutral-200"></span><span><i class="fa-solid fa-hand-holding-heart mr-2 text-secondary/70"></i>NGO Lokal Papua</span><span class="flex-1 h-px bg-neutral-200"></span></h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#11</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">KIPRa Papua</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Konsultasi Independen Pemberdayaan Masyarakat Papua</p><a href="https://www.instagram.com/kipra_papua/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> instagram.com/kipra_papua</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#12</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">JERAT Papua</h4><p class="text-neutral-500 text-base mt-0.5">Jaringan Kerja Rakyat Papua</p><a href="https://www.jeratpapua.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> jeratpapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#13</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">WALHI Papua</h4><p class="text-neutral-500 text-base mt-0.5">Wahana Lingkungan Hidup Papua</p><a href="https://www.instagram.com/walhi_papua/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> instagram.com/walhi_papua</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#14</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">FOKER Papua</h4><p class="text-neutral-500 text-base mt-0.5">Forum Kerjasama LSM Papua</p><a href="https://www.tanahpapua.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> tanahpapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#15</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">YALI Papua</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Lingkungan Hidup Papua</p><a href="https://yalipapua.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> yalipapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#16</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">INTSIA Papua</h4><a href="https://intsiapapua.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> intsiapapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#17</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">LEKAT</h4><p class="text-neutral-500 text-base mt-0.5">Lembaga Pengkajian dan Pemberdayaan Masyarakat Adat</p><a href="https://lekatpapua.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> lekatpapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#18</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">RUMSRAM</h4><a href="https://rumsram.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> rumsram.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#19</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">YPMD Papua</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Pengembangan Masyarakat Desa Papua</p><a href="https://ypmdpapua.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> ypmdpapua.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#20</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">WWF Regional Papua</h4><p class="text-neutral-500 text-base mt-0.5">World Wide Fund for Nature Regional Papua</p><a href="https://wwf.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> wwf.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#21</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">KIPAS</h4><p class="text-neutral-500 text-base mt-0.5">Komunitas Masyarakat Peduli Alam dan Lingkungan</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#22</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-green-50 text-green-700">NGO Lokal</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">YWSS</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Wahana Sejahtera Sorong</p></div>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-bold uppercase tracking-widest text-neutral-400 mb-6 flex items-center gap-3"><span class="flex-1 h-px bg-neutral-200"></span><span><i class="fa-solid fa-globe mr-2 text-secondary/70"></i>NGO Nasional</span><span class="flex-1 h-px bg-neutral-200"></span></h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#23</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">JKPP</h4><p class="text-neutral-500 text-base mt-0.5">Jaringan Kerja Pemetaan Partisipatif</p><a href="https://jkpp.org/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> jkpp.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#24</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">BRWA</h4><p class="text-neutral-500 text-base mt-0.5">Badan Registrasi Wilayah Adat</p><a href="https://brwa.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> brwa.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#25</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">KEMITRAAN Indonesia</h4><a href="https://kemitraan.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> kemitraan.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#26</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">HUMA</h4><p class="text-neutral-500 text-base mt-0.5">Perkumpulan untuk Pembaharuan Hukum Berbasis Masyarakat</p><a href="https://huma.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> huma.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#27</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">The Samdhana Institute</h4><a href="https://samdhana.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> samdhana.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#28</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">LP3AP</h4><p class="text-neutral-500 text-base mt-0.5">Lembaga Pengkajian Pemberdayaan Perempuan &amp; Anak Papua</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#29</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">YAPPIKA</h4><a href="https://yappika-actionaid.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> yappika-actionaid.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#30</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">LINGKAR MADANI</h4><p class="text-neutral-500 text-base mt-0.5">Lingkar Madani Indonesia</p><a href="https://lingkarmadani.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> lingkarmadani.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#31</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">PATTIRO</h4><p class="text-neutral-500 text-base mt-0.5">Pusat Telaah dan Informasi Regional</p><a href="https://pattiro.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> pattiro.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#32</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">PERNIK</h4><p class="text-neutral-500 text-base mt-0.5">Perkumpulan untuk Pemberdayaan dan Pendidikan</p></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#33</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">PUSAKA</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Pusaka Bentala Rakyat</p><a href="https://pusaka.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> pusaka.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#34</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">WALHI Nasional</h4><p class="text-neutral-500 text-base mt-0.5">Wahana Lingkungan Hidup Indonesia</p><a href="https://walhi.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> walhi.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#35</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">TLE</h4><p class="text-neutral-500 text-base mt-0.5">The Local Enablers</p><a href="https://thelocalenablers.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> thelocalenablers.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#36</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Greenpeace Indonesia</h4><a href="https://greenpeace.org/indonesia" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> greenpeace.org/indonesia</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#37</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">EcoNusa</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Ekosistem Nusantara Berkelanjutan</p><a href="https://econusa.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> econusa.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#38</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">YADUPA</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Pendidikan Kebudayaan Papua</p><a href="https://yadupa.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> yadupa.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#39</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Dewan Adat TABI</h4></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#40</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Dewan Adat Papua</h4><a href="https://dewanadatpapua.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> dewanadatpapua.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#41</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Solidaritas Perempuan Adat Papua</h4><p class="text-neutral-500 text-base mt-0.5">SPP</p><a href="https://www.instagram.com/solidaritasperempuan" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> @solidaritasperempuan</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#42</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">JUBI</h4><a href="https://jubi.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> jubi.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#43</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">Yayasan SATUNAMA</h4><p class="text-neutral-500 text-base mt-0.5">Yogyakarta</p><a href="https://satunama.org" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> satunama.org</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#44</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">SKALA</h4><p class="text-neutral-500 text-base mt-0.5">Sinergi Kapasitas Lintas Organisasi</p><a href="https://skala.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> skala.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#45</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">WGGI</h4><p class="text-neutral-500 text-base mt-0.5">Working Group on Forest Tenures</p><a href="https://wggt.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> wggt.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#46</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">AMAN</h4><p class="text-neutral-500 text-base mt-0.5">Aliansi Masyarakat Adat Nusantara</p><a href="https://aman.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> aman.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#47</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">PUTER</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Puter Indonesia</p><a href="https://puter.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> puter.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#48</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">KPA</h4><p class="text-neutral-500 text-base mt-0.5">Konsorsium Pembaruan Agraria</p><a href="https://kpa.or.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> kpa.or.id</a></div>
                <div class="rounded-lg bg-white border border-neutral-100 p-5 hover:border-secondary/40 hover:shadow-card transition fade-in"><div class="flex items-center justify-between mb-2"><span class="text-base font-mono text-neutral-300">#49</span><span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-purple-50 text-purple-700">NGO Nasional</span></div><h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">PENABULU</h4><p class="text-neutral-500 text-base mt-0.5">Yayasan Penabulu</p><a href="https://penabulu.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-secondary text-base hover:underline mt-2"><i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> penabulu.id</a></div>
            </div>
        </div>
    </div>
</section>
HTML,
            ],

            // -------------------------------------------------------
            // 5. FAQ — tetap di /halaman/faq
            // -------------------------------------------------------
            [
                'judul'     => 'FAQ',
                'slug'      => 'faq',
                'keterangan'=> 'Pertanyaan yang sering diajukan seputar organisasi, program, donasi, dan blog YALI Papua',
                'urutan'    => 5,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12 fade-in text-center">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-circle-question mr-2"></i>Pusat Bantuan</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-neutral-500 mt-3 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan umum seputar YALI Papua, program kerja, donasi, dan layanan kami.</p>
        </div>
        <div class="max-w-4xl mx-auto space-y-4">
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">1</span>Apa itu YALI Papua?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua (<em>Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua</em>) adalah organisasi masyarakat sipil (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat Papua. Didirikan pada tahun 1988, lembaga ini bekerja melalui 5 pilar program: Penguatan Masyarakat Adat (PMA), Kajian Pendidikan Publik (KPP), Pengembangan Ekonomi Masyarakat Adat (PEMA), Penguatan Perempuan Adat (PPA), dan Penguatan Institusi &amp; Sumber Daya (PISD).</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">2</span>Apa visi dan misi YALI Papua?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">Visi YALI Papua adalah terwujudnya Masyarakat Adat Papua yang mampu mengorganisir diri dan merekonsiliasi hubungan dengan Tuhan dan alam semesta untuk kehidupan yang berdaulat dan berkelanjutan di tahun 2040. Misi kami mencakup penguatan kelembagaan adat, kajian kebijakan, pengembangan ekonomi, penguatan perempuan, dan penguatan institusi lembaga. Selengkapnya di halaman <a href="/profil" class="text-secondary underline font-semibold">Profil Lembaga</a>.</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">3</span>Di mana saja wilayah kerja YALI Papua?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua berkantor pusat di Jl. Pramuka No. 18, Buper Waena, Kota Jayapura. Wilayah kerja meliputi Kabupaten Jayapura dan Kabupaten Sarmi (Provinsi Papua), serta Kabupaten Mappi (Provinsi Papua Selatan). Pendampingan juga dilakukan di 7 wilayah adat di Tanah Papua.</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">4</span>Bagaimana cara berdonasi untuk program YALI Papua?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">Anda dapat berdonasi melalui halaman <a href="/donasi" class="text-secondary underline font-semibold">Donasi</a>. Lakukan transfer ke rekening resmi yang tertera, simpan bukti transfer, lalu hubungi admin melalui halaman <a href="/kontak" class="text-secondary underline font-semibold">Kontak</a> untuk konfirmasi manual. Seluruh donasi dikelola secara transparan dan akuntabel.</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">5</span>Apakah konten blog berasal dari YALI Papua sendiri?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">Blog YALI Papua memuat artikel asli yang ditulis oleh tim kami, serta artikel yang di-<em>repost</em> dari media dan portal berita tepercaya seperti Antara News, Mongabay Indonesia, Jubi, dan lainnya. Setiap artikel yang bersumber dari pihak ketiga selalu mencantumkan nama sumber dan tautan asli sebagai bentuk penghormatan terhadap hak cipta dan transparansi informasi.</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">6</span>Bagaimana cara bermitra dengan YALI Papua?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua terbuka untuk kemitraan dengan lembaga internasional, pemerintah, organisasi masyarakat sipil, dan sektor swasta yang memiliki komitmen terhadap pemberdayaan masyarakat adat Papua. Silakan hubungi kami melalui halaman <a href="/kontak" class="text-secondary underline font-semibold">Kontak</a> atau WhatsApp di <strong>+62 821-9750-1692</strong>.</p></div>
            </div>
            <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-secondary text-white text-xs font-bold flex items-center justify-center flex-shrink-0">7</span>Apakah website ini menyediakan sitemap untuk SEO?</h3></div>
                <div class="p-5"><p class="text-neutral-600 leading-relaxed">Ya, kami menyediakan <a href="/sitemap.xml" class="text-secondary underline font-semibold">sitemap XML</a> untuk membantu mesin pencari mengindeks seluruh halaman publik. Kami juga memiliki halaman <a href="/peta-situs" class="text-secondary underline font-semibold">Peta Situs</a> yang menampilkan daftar lengkap halaman untuk navigasi pengunjung.</p></div>
            </div>
        </div>
    </div>
</section>
HTML,
            ],

            // -------------------------------------------------------
            // 6. Disclaimer — tetap di /halaman/disclaimer
            // -------------------------------------------------------
            [
                'judul'     => 'Disclaimer',
                'slug'      => 'disclaimer',
                'keterangan'=> 'Syarat penggunaan, hak cipta, kebijakan konten reposted, dan informasi hukum website YALI Papua',
                'urutan'    => 6,
                'konten'    => <<<'HTML'
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12 fade-in text-center">
            <p class="text-xs font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-shield-halved mr-2"></i>Ketentuan Hukum</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Disclaimer &amp; Kebijakan Penggunaan</h2>
            <p class="text-neutral-500 mt-3 max-w-2xl mx-auto">Harap baca ketentuan berikut sebelum menggunakan website YALI Papua.</p>
        </div>
        <div class="max-w-4xl mx-auto space-y-8 text-neutral-600 leading-relaxed">
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-info-circle text-secondary mr-2"></i>Informasi Umum</h2>
                <p>Website ini dikelola oleh Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua (YALI Papua) sebagai sarana informasi dan komunikasi resmi lembaga. Seluruh konten yang ditampilkan, termasuk teks, gambar, dan dokumen, merupakan milik YALI Papua atau digunakan dengan izin dari pemilik yang sah, kecuali dinyatakan lain.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-check-double text-secondary mr-2"></i>Keakuratan Informasi</h2>
                <p>YALI Papua berupaya menjaga keakuratan dan kemutakhiran informasi yang dipublikasikan. Namun, kami tidak dapat menjamin bahwa seluruh informasi selalu akurat, lengkap, atau terbaru. Penggunaan informasi dari website ini sepenuhnya menjadi tanggung jawab pengguna.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-newspaper text-secondary mr-2"></i>Konten Blog &amp; Artikel Reposted</h2>
                <p>Halaman blog YALI Papua memuat dua jenis konten:</p>
                <ul class="list-disc pl-6 mt-2 space-y-1">
                    <li><strong>Konten Asli</strong> — artikel yang ditulis langsung oleh tim YALI Papua.</li>
                    <li><strong>Konten Reposted</strong> — artikel yang diambil dari media dan portal berita pihak ketiga (seperti Antara News, Mongabay Indonesia, Jubi, Papua.go.id, dan media lainnya) yang berkaitan dengan kegiatan dan isu masyarakat adat Papua.</li>
                </ul>
                <p class="mt-3">Setiap konten reposted selalu mencantumkan <strong>nama sumber asli</strong> dan <strong>tautan ke artikel asli</strong> sebagai bentuk penghormatan terhadap hak cipta penulis dan penerbit asli. Konten reposted dimuat semata-mata untuk tujuan edukasi dan penyebaran informasi, bukan untuk tujuan komersial. Apabila pemilik konten asli keberatan, silakan hubungi kami melalui halaman <a href="/kontak" class="text-secondary underline font-semibold">Kontak</a> untuk penghapusan.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-heart text-secondary mr-2"></i>Donasi</h2>
                <p>Informasi donasi pada website ini bersifat umum dan dapat berubah sewaktu-waktu. YALI Papua berkomitmen mengelola seluruh dana donasi secara transparan dan akuntabel untuk mendukung kegiatan lembaga. Donasi yang telah dikirimkan tidak dapat dikembalikan (<em>non-refundable</em>) kecuali terjadi kesalahan teknis yang dapat dibuktikan.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-arrow-up-right-from-square text-secondary mr-2"></i>Tautan Eksternal</h2>
                <p>Website ini mungkin memuat tautan ke situs web pihak ketiga. YALI Papua tidak bertanggung jawab atas konten, kebijakan privasi, atau praktik situs web eksternal tersebut. Pengguna disarankan membaca kebijakan masing-masing situs sebelum memberikan informasi pribadi.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-copyright text-secondary mr-2"></i>Hak Cipta &amp; Lisensi</h2>
                <p>Seluruh konten asli di website ini dilindungi oleh hak cipta &copy; YALI Papua. Dilarang memperbanyak, mendistribusikan, atau menggunakan konten untuk tujuan komersial tanpa izin tertulis. Penggunaan untuk tujuan edukasi dan non-komersial diperbolehkan dengan mencantumkan kredit dan tautan balik ke website YALI Papua.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-user-shield text-secondary mr-2"></i>Privasi Data</h2>
                <p>Data pribadi yang Anda berikan melalui kanal kontak atau proses konfirmasi donasi manual hanya digunakan untuk keperluan internal YALI Papua dan tidak akan dibagikan kepada pihak ketiga tanpa persetujuan Anda, kecuali diwajibkan oleh hukum yang berlaku di Indonesia.</p>
            </div>
            <div class="fade-in">
                <h2 class="text-xl font-display font-bold text-neutral-900 mb-3"><i class="fa-solid fa-envelope text-secondary mr-2"></i>Kontak</h2>
                <p>Jika Anda memiliki pertanyaan mengenai disclaimer ini atau ingin melaporkan pelanggaran hak cipta, silakan hubungi kami melalui halaman <a href="/kontak" class="text-secondary underline font-semibold">Kontak</a> atau WhatsApp di <strong>+62 821-9750-1692</strong>.</p>
            </div>
        </div>
    </div>
</section>
HTML,
            ],
        ];

        foreach ($pages as $page) {
            Halaman::updateOrCreate(
                ['slug' => $page['slug']],
                array_merge($page, ['user_id' => 1])
            );
        }

        $this->command->info('HalamanSeeder: ' . count($pages) . ' halaman berhasil dibuat/diperbarui.');
    }
}
