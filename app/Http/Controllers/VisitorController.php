<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Halaman;
use App\Models\KategoriBlog;

class VisitorController extends Controller
{
    public function beranda()
    {
        $blogTerbaru = Blog::with('kategori', 'media')
            ->where('status', 'terbit')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $fotoBerceritaTerbaru = Galeri::with(['media', 'coverMedia'])->where('is_publik', true)->latest()->take(6)->get();

        return view('visitor.beranda', compact('blogTerbaru', 'fotoBerceritaTerbaru'));
    }

    public function blog()
    {
        $query = Blog::with('kategori', 'media')
            ->where('status', 'terbit');

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('ringkasan', 'like', '%' . request('cari') . '%');
            });
        }

        $blogList = $query
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();
        $kategoriList = KategoriBlog::whereHas('blog', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['blog' => fn ($q) => $q->where('status', 'terbit')])
            ->get();
        $kategoriAktif = null;
        $blogPopuler = Blog::with('media')
            ->where('status', 'terbit')
            ->orderByDesc('jumlah_dibaca')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        return view('visitor.blog.index', compact('blogList', 'kategoriList', 'kategoriAktif', 'blogPopuler'));
    }

    public function blogKategori(string $slug)
    {
        $kategoriAktif = KategoriBlog::where('slug', $slug)->firstOrFail();

        $query = Blog::with('kategori', 'media')
            ->where('status', 'terbit')
            ->where('kategori_berita_id', $kategoriAktif->id);

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('ringkasan', 'like', '%' . request('cari') . '%');
            });
        }

        $blogList = $query
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();
        $kategoriList = KategoriBlog::whereHas('blog', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['blog' => fn ($q) => $q->where('status', 'terbit')])
            ->get();
        $blogPopuler = Blog::with('media')
            ->where('status', 'terbit')
            ->orderByDesc('jumlah_dibaca')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        return view('visitor.blog.index', compact('blogList', 'kategoriList', 'kategoriAktif', 'blogPopuler'));
    }

    public function blogDetail(string $slug)
    {
        $blog = Blog::with('kategori', 'media', 'user')
            ->where('slug', $slug)
            ->where('status', 'terbit')
            ->firstOrFail();

        $kategoriAktif = $blog->kategori;

        $blog->increment('jumlah_dibaca');
        $blog->refresh();
        $kategoriList = KategoriBlog::whereHas('blog', fn ($q) => $q->where('status', 'terbit'))
            ->withCount(['blog' => fn ($q) => $q->where('status', 'terbit')])
            ->get();

        $blogTerkait = Blog::with('kategori', 'media')
            ->where('status', 'terbit')
            ->where('id', '!=', $blog->id)
            ->when($blog->kategori_berita_id, function ($q) use ($blog) {
                $q->where('kategori_berita_id', $blog->kategori_berita_id);
            })
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(2)
            ->get();
        $blogPopuler = Blog::with('media')
            ->where('status', 'terbit')
            ->where('id', '!=', $blog->id)
            ->orderByDesc('jumlah_dibaca')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        return view('visitor.blog.detail', compact('blog', 'blogTerkait', 'kategoriList', 'kategoriAktif', 'blogPopuler'));
    }

    public function berita()
    {
        return $this->blog();
    }

    public function beritaKategori(string $slug)
    {
        return $this->blogKategori($slug);
    }

    public function beritaDetail(string $slug)
    {
        return $this->blogDetail($slug);
    }

    public function fotoBercerita()
    {
        $query = Galeri::withCount('media')
            ->with(['media', 'coverMedia'])
            ->where('is_publik', true)
            ->latest();

        if (request('cari')) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . request('cari') . '%')
                  ->orWhere('deskripsi', 'like', '%' . request('cari') . '%');
            });
        }

        $fotoBerceritaList = $query->paginate(12)->withQueryString();
        return view('visitor.galeri', compact('fotoBerceritaList'));
    }

    public function fotoBerceritaDetail(string $slug)
    {
        $galeri = Galeri::with(['media', 'coverMedia'])->where('slug', $slug)->where('is_publik', true)->firstOrFail();
        $galeri->increment('jumlah_dibaca');
        $galeri->refresh();

        return view('visitor.galeri-detail', compact('galeri'));
    }

    public function kontak()
    {
        return view('visitor.kontak');
    }

    public function donasi()
    {
        return view('visitor.donasi');
    }

    public function mitra()
    {
        return view('visitor.mitra');
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
        $kategoriBlogList = KategoriBlog::whereNotNull('slug')
            ->withCount(['blog' => fn ($q) => $q->where('status', 'terbit')])
            ->get();
        $blogTerbaru = Blog::where('status', 'terbit')
            ->orderByDesc('tanggal_terbit')
            ->orderByDesc('id')
            ->take(20)
            ->get();
        $fotoBerceritaTerbaru = Galeri::where('is_publik', true)->latest()->take(20)->get();

        return view('visitor.peta-situs', compact(
            'halamanList',
            'kategoriBlogList',
            'blogTerbaru',
            'fotoBerceritaTerbaru'
        ));
    }
}
