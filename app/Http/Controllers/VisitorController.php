<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Donasi;
use App\Models\Galeri;
use App\Models\Halaman;
use App\Models\KategoriBerita;
use App\Models\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    public function beranda()
    {
        $beritaTerbaru = Berita::with('kategori', 'media')
            ->where('status', 'terbit')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $galeriTerbaru = Galeri::with('media')->where('is_publik', true)->latest()->take(6)->get();

        return view('visitor.beranda', compact('beritaTerbaru', 'galeriTerbaru'));
    }

    public function berita()
    {
        $query = Berita::with('kategori', 'media')
            ->where('status', 'terbit');

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('ringkasan', 'like', '%' . request('cari') . '%');
            });
        }

        $beritaList = $query
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();
        $kategoriList = KategoriBerita::whereHas('berita', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['berita' => fn ($q) => $q->where('status', 'terbit')])
            ->get();
        $kategoriAktif = null;

        return view('visitor.blog.index', compact('beritaList', 'kategoriList', 'kategoriAktif'));
    }

    public function beritaKategori(string $slug)
    {
        $kategoriAktif = KategoriBerita::where('slug', $slug)->firstOrFail();

        $query = Berita::with('kategori', 'media')
            ->where('status', 'terbit')
            ->where('kategori_berita_id', $kategoriAktif->id);

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('ringkasan', 'like', '%' . request('cari') . '%');
            });
        }

        $beritaList = $query
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();
        $kategoriList = KategoriBerita::whereHas('berita', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['berita' => fn ($q) => $q->where('status', 'terbit')])
            ->get();

        return view('visitor.blog.index', compact('beritaList', 'kategoriList', 'kategoriAktif'));
    }

    public function beritaDetail(string $slug)
    {
        $berita = Berita::with('kategori', 'media', 'user')
            ->where('slug', $slug)
            ->where('status', 'terbit')
            ->firstOrFail();

        $kategoriAktif = $berita->kategori;

        $berita->increment('jumlah_dibaca');
        $kategoriList = KategoriBerita::whereHas('berita', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['berita' => fn ($q) => $q->where('status', 'terbit')])
            ->get();

        $beritaTerkait = Berita::with('kategori', 'media')
            ->where('status', 'terbit')
            ->where('id', '!=', $berita->id)
            ->when($berita->kategori_berita_id, function ($q) use ($berita) {
                $q->where('kategori_berita_id', $berita->kategori_berita_id);
            })
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(2)
            ->get();
        return view('visitor.blog.detail', compact('berita', 'beritaTerkait', 'kategoriList', 'kategoriAktif'));
    }

    public function galeri()
    {
        $query = Galeri::withCount('media')->where('is_publik', true)->latest();

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
            });
        }

        $galeriList = $query->paginate(12)->withQueryString();

        // Load first media for cover image
        $galeriList->load(['media' => fn ($q) => $q->limit(1)]);
        return view('visitor.galeri', compact('galeriList'));
    }

    public function galeriDetail(string $slug)
    {
        $galeri = Galeri::with('media')->where('slug', $slug)->where('is_publik', true)->firstOrFail();

        return view('visitor.galeri-detail', compact('galeri'));
    }

    public function kontak()
    {
        return view('visitor.kontak');
    }

    public function donasi()
    {
        $programs = ProgramDonasi::with('media')
            ->where('is_active', true)
            ->latest()
            ->get();

        $testimoni = Donasi::with('programDonasi')
            ->where('status', 'dikonfirmasi')
            ->where('is_publik', true)
            ->whereNotNull('pesan')
            ->where('pesan', '!=', '')
            ->latest()
            ->take(12)
            ->get();

        return view('visitor.donasi', compact('programs', 'testimoni'));
    }

    public function donasiStore(Request $request)
    {
        $request->validate([
            'program_donasi_id' => 'required|exists:program_donasi,id',
            'nama_donatur'      => 'required|string|max:255',
            'is_anonim'         => 'nullable|boolean',
            'email'             => 'nullable|email|max:255',
            'telepon'           => 'nullable|string|max:20',
            'jumlah'            => 'required|integer|min:1',
            'pesan'             => 'nullable|string|max:1000',
            'bukti_transfer'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $ext = $file->getClientOriginalExtension() ?: 'jpg';
            $buktiPath = $file->storeAs('donasi', \App\Helpers\ImageHelper::generateFilename($ext), 'public');
        }

        Donasi::create([
            'program_donasi_id' => $request->program_donasi_id,
            'nama_donatur'      => $request->nama_donatur,
            'is_anonim'         => $request->boolean('is_anonim'),
            'email'             => $request->email,
            'telepon'           => $request->telepon,
            'bank'              => ProgramDonasi::BANK_NAMA,
            'jumlah'            => $request->jumlah,
            'pesan'             => $request->pesan,
            'bukti_transfer'    => $buktiPath,
            'status'            => 'pending',
            'tanggal'           => now()->toDateString(),
        ]);

        return redirect()->route('donasi')->with('success', 'Terima kasih! Konfirmasi donasi Anda telah kami terima dan sedang diproses.');
    }

    public function mitra()
    {
        $halaman = Halaman::where('slug', 'mitra')
            ->where('is_active', true)
            ->firstOrFail();

        return view('visitor.mitra', compact('halaman'));
    }

    public function halaman(string $slug)
    {
        $halaman = Halaman::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('visitor.halaman', compact('halaman'));
    }

    public function petaSitus()
    {
        $halamanList = Halaman::where('is_active', true)->orderBy('urutan')->get();
        $kategoriBeritaList = KategoriBerita::whereNotNull('slug')
            ->withCount(['berita' => fn ($q) => $q->where('status', 'terbit')])
            ->get();
        $beritaTerbaru = Berita::where('status', 'terbit')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(20)
            ->get();
        $galeriTerbaru = Galeri::latest()->take(20)->get();

        return view('visitor.peta-situs', compact(
            'halamanList',
            'kategoriBeritaList',
            'beritaTerbaru',
            'galeriTerbaru'
        ));
    }
}
