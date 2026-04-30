<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\PengaturanSitusController;
use App\Http\Controllers\Admin\AktivitasLoginController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\BackupDatabaseController;
use App\Http\Controllers\Admin\BackupStorageController;
use App\Http\Controllers\Admin\HalamanController;
use App\Http\Controllers\Penulis\AktivitasLoginController as PenulisAktivitasLoginController;
use App\Http\Controllers\Penulis\DashboardController as PenulisDashboardController;
use App\Http\Controllers\Penulis\BlogController;
use App\Http\Controllers\Penulis\KategoriBlogController;
use App\Http\Controllers\Penulis\GaleriController;
use App\Http\Controllers\Penulis\MediaController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\StatistikPengunjungController;
use App\Http\Controllers\StorageFileController;

/*
|--------------------------------------------------------------------------
| Storage Fallback
|--------------------------------------------------------------------------
| Serve file dari storage/app/public via PHP.
| Aktif otomatis jika web server tidak bisa serve file statis
| (cPanel tanpa symlink, php artisan serve di Windows, dll).
*/
Route::get('/storage/{path}', [StorageFileController::class, 'show'])->where('path', '.*')->name('storage.serve');

/*
|--------------------------------------------------------------------------
| SEO Routes (robots.txt & sitemap.xml)
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots']);
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);

/*
|--------------------------------------------------------------------------
| Visitor (Public) Routes
|--------------------------------------------------------------------------
*/
Route::middleware('track.visitor')->group(function () {
    Route::get('/', [VisitorController::class, 'beranda'])->name('beranda');

    // Halaman dinamis (CMS)
    Route::get('/halaman/{slug}', [VisitorController::class, 'halaman'])->name('halaman.show');

    // Halaman CMS — route slug sesuai slug di database
    Route::get('/sejarah',      fn () => app(VisitorController::class)->halaman('sejarah')     )->name('sejarah');
    Route::view('/profil', 'visitor.profil')->name('profil');
    Route::get('/pilar-kerja', fn () => app(VisitorController::class)->halaman('bidang-kerja'))->name('pilar-kerja');
    Route::get('/faq',          fn () => app(VisitorController::class)->halaman('faq')         )->name('faq');
    Route::get('/disclaimer',   fn () => app(VisitorController::class)->halaman('disclaimer')  )->name('disclaimer');
    Route::get('/mitra',        [VisitorController::class, 'mitra'])->name('mitra');
    Route::view('/kepengurusan', 'visitor.pengurusan')->name('kepengurusan');

    // Program (static)
    Route::view('/program', 'visitor.program')->name('program');

    // Donasi (halaman statis)
    Route::get('/donasi', [VisitorController::class, 'donasi'])->name('donasi');

    // Blog (dynamic)
    Route::get('/blog', [VisitorController::class, 'blog'])->name('blog');
    Route::get('/blog/kategori/{slug}', [VisitorController::class, 'blogKategori'])->name('blog.kategori');
    Route::get('/blog/{slug}', [VisitorController::class, 'blogDetail'])->name('blog.detail');
    // Redirect URL lama berita
    Route::redirect('/berita', '/blog', 301);
    Route::redirect('/berita/kategori/{slug}', '/blog/kategori/{slug}', 301);
    Route::redirect('/berita/{slug}', '/blog/{slug}', 301);

    // Foto Bercerita (dynamic)
    Route::get('/foto-bercerita', [VisitorController::class, 'fotoBercerita'])->name('foto-bercerita');
    Route::get('/foto-bercerita/{slug}', [VisitorController::class, 'fotoBerceritaDetail'])->name('foto-bercerita.detail');
    // Redirect URL lama galeri
    Route::redirect('/galeri', '/foto-bercerita', 301);
    Route::redirect('/galeri/{slug}', '/foto-bercerita/{slug}', 301);

    // Kontak
    Route::get('/kontak', [VisitorController::class, 'kontak'])->name('kontak');

    // Peta Situs (HTML Sitemap)
    Route::get('/peta-situs', [VisitorController::class, 'petaSitus'])->name('peta-situs');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest.custom')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth.custom');

/*
|--------------------------------------------------------------------------
| Admin Master Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth.custom', 'role:admin_master'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengaturan-situs', [PengaturanSitusController::class, 'index'])->name('pengaturan-situs');
    Route::put('/pengaturan-situs', [PengaturanSitusController::class, 'update'])->name('pengaturan-situs.update');
    Route::get('/aktivitas-login', [AktivitasLoginController::class, 'index'])->name('aktivitas-login');
    Route::get('/backup-database', [BackupDatabaseController::class, 'index'])->name('backup-database');
    Route::post('/backup-database/create', [BackupDatabaseController::class, 'create'])->name('backup-database.create');
    Route::get('/backup-database/download/{filename}', [BackupDatabaseController::class, 'download'])->name('backup-database.download');
    Route::delete('/backup-database/{filename}', [BackupDatabaseController::class, 'destroy'])->name('backup-database.destroy');
    Route::post('/backup-database/restore', [BackupDatabaseController::class, 'restore'])->name('backup-database.restore');

    // Backup Storage
    Route::get('/backup-storage', [BackupStorageController::class, 'index'])->name('backup-storage');
    Route::post('/backup-storage/create', [BackupStorageController::class, 'create'])->name('backup-storage.create');
    Route::get('/backup-storage/download/{filename}', [BackupStorageController::class, 'download'])->name('backup-storage.download');
    Route::delete('/backup-storage/{filename}', [BackupStorageController::class, 'destroy'])->name('backup-storage.destroy');
    Route::post('/backup-storage/restore', [BackupStorageController::class, 'restore'])->name('backup-storage.restore');
    Route::post('/backup-storage/storage-link', [BackupStorageController::class, 'createStorageLink'])->name('backup-storage.storage-link');

    // Pengguna CRUD
    Route::resource('pengguna', PenggunaController::class)->except(['show']);
    Route::patch('/pengguna/{pengguna}/restore', [PenggunaController::class, 'restore'])->name('pengguna.restore');
    Route::delete('/pengguna/{pengguna}/force-delete', [PenggunaController::class, 'forceDelete'])->name('pengguna.force-delete');

    // Halaman
    Route::resource('halaman', HalamanController::class)->except(['show']);
    Route::patch('/halaman/{halaman}/restore', [HalamanController::class, 'restore'])->name('halaman.restore');
    Route::delete('/halaman/{halaman}/force-delete', [HalamanController::class, 'forceDelete'])->name('halaman.force-delete');

    // Statistik
    Route::get('/statistik-pengunjung', [StatistikPengunjungController::class, 'index'])->name('statistik-pengunjung');

    // Profil
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Dokumentasi
    Route::view('/dokumentasi', 'admin.dokumentasi')->name('dokumentasi');
});

/*
|--------------------------------------------------------------------------
| Penulis Routes
|--------------------------------------------------------------------------
*/
Route::prefix('penulis')->name('penulis.')->middleware(['auth.custom', 'role:penulis'])->group(function () {
    Route::get('/dashboard', [PenulisDashboardController::class, 'index'])->name('dashboard');

    // Konten
    Route::resource('blog', BlogController::class)->except(['show']);
    Route::patch('/blog/{blog}/restore', [BlogController::class, 'restore'])->name('blog.restore');
    Route::delete('/blog/{blog}/force-delete', [BlogController::class, 'forceDelete'])->name('blog.force-delete');
    Route::resource('kategori-blog', KategoriBlogController::class)->except(['show']);
    Route::patch('/kategori-blog/{kategori_blog}/restore', [KategoriBlogController::class, 'restore'])->name('kategori-blog.restore');
    Route::delete('/kategori-blog/{kategori_blog}/force-delete', [KategoriBlogController::class, 'forceDelete'])->name('kategori-blog.force-delete');
    // Redirect URL lama berita/kategori-berita
    Route::redirect('/berita', '/penulis/blog', 301);
    Route::redirect('/berita/create', '/penulis/blog/create', 301);
    Route::redirect('/kategori-berita', '/penulis/kategori-blog', 301);
    Route::redirect('/kategori-berita/create', '/penulis/kategori-blog/create', 301);
    // Media
    Route::get('/media/json', [MediaController::class, 'json'])->name('media.json');
    Route::post('/media/upload-ajax', [MediaController::class, 'uploadAjax'])->name('media.upload-ajax');
    Route::resource('media', MediaController::class)->except(['show']);
    Route::patch('/media/{medium}/restore', [MediaController::class, 'restore'])->name('media.restore');
    Route::delete('/media/{medium}/force-delete', [MediaController::class, 'forceDelete'])->name('media.force-delete');
    Route::resource('foto-bercerita', GaleriController::class)
        ->parameters(['foto-bercerita' => 'galeri'])
        ->except(['show']);
    Route::patch('/foto-bercerita/{galeri}/toggle-publik', [GaleriController::class, 'togglePublik'])->name('foto-bercerita.toggle-publik');
    Route::patch('/foto-bercerita/{galeri}/restore', [GaleriController::class, 'restore'])->name('foto-bercerita.restore');
    Route::delete('/foto-bercerita/{galeri}/force-delete', [GaleriController::class, 'forceDelete'])->name('foto-bercerita.force-delete');


    // Statistik
    Route::get('/statistik-pengunjung', [StatistikPengunjungController::class, 'index'])->name('statistik-pengunjung');

    // Aktivitas Login (hanya penulis)
    Route::get('/aktivitas-login', [PenulisAktivitasLoginController::class, 'index'])->name('aktivitas-login');

    // Profil
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Dokumentasi / Panduan Penggunaan
    Route::view('/dokumentasi', 'penulis.dokumentasi')->name('dokumentasi');
});
