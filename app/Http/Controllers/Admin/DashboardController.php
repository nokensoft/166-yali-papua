<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Berita;
use App\Models\Donasi;
use App\Models\ProgramDonasi;
use App\Models\AktivitasLogin;
use App\Models\Halaman;
use App\Models\Galeri;
use App\Models\Media;
use App\Models\KategoriBerita;
use App\Models\KunjunganSitus;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonasi = Donasi::where('status', 'dikonfirmasi')->sum('jumlah');

        $stats = [
            ['icon' => 'fa-users',              'value' => User::count(),                                    'label' => 'Total Pengguna',       'color' => 'bg-primary'],
            ['icon' => 'fa-file-alt',            'value' => Halaman::count(),                                 'label' => 'Halaman CMS',          'color' => 'bg-blue-600'],
            ['icon' => 'fa-newspaper',           'value' => Berita::count(),                                  'label' => 'Blog',                 'color' => 'bg-indigo-600'],
            ['icon' => 'fa-tags',                'value' => KategoriBerita::count(),                          'label' => 'Kategori Blog',        'color' => 'bg-pink-600'],
            ['icon' => 'fa-images',              'value' => Galeri::count(),                                  'label' => 'Album Galeri',         'color' => 'bg-purple-600'],
            ['icon' => 'fa-photo-video',         'value' => Media::count(),                                   'label' => 'Total Media',          'color' => 'bg-cyan-600'],
            ['icon' => 'fa-hand-holding-heart',  'value' => ProgramDonasi::where('is_active', true)->count(), 'label' => 'Program Donasi',       'color' => 'bg-teal-600'],
            ['icon' => 'fa-heart',               'value' => Donasi::where('status', 'pending')->count(),     'label' => 'Donasi Pending',       'color' => 'bg-orange-500'],
            ['icon' => 'fa-donate',              'value' => 'Rp ' . number_format($totalDonasi, 0, ',', '.'), 'label' => 'Total Terkumpul',      'color' => 'bg-green-700'],
            ['icon' => 'fa-eye',                 'value' => number_format(KunjunganSitus::where('tanggal', today())->count()), 'label' => 'Pengunjung Hari Ini', 'color' => 'bg-sky-600'],
        ];

        $loginTerbaru = AktivitasLogin::with('user')
            ->latest()
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::with('kategori')
            ->latest()
            ->take(5)
            ->get();

        $donasiTerbaru = Donasi::with('programDonasi')
            ->latest()
            ->take(5)
            ->get();

        $sistem = [
            'laravel'  => App::version(),
            'php'      => PHP_VERSION,
            'database' => config('database.default') . ' (' . DB::getDatabaseName() . ')',
        ];

        return view('admin.dashboard', compact('stats', 'loginTerbaru', 'beritaTerbaru', 'donasiTerbaru', 'sistem'));
    }
}
