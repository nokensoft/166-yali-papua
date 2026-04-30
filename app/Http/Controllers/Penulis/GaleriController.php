<?php

namespace App\Http\Controllers\Penulis;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::withCount('media')
            ->with('media');

        if ($request->filled('cari')) {
            $query->where('judul', 'like', "%{$request->cari}%");
        }

        if ($request->get('status') === 'terhapus') {
            $query->onlyTrashed();
        }

        $galeri = $query->latest()->paginate(10)->withQueryString();

        return view('penulis.galeri.index', compact('galeri'));
    }

    public function create()
    {
        $media = Media::where('tipe', 'foto')->latest()->get();

        return view('penulis.galeri.form', compact('media') + ['editMode' => false]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateGaleriRequest($request);

        $galeri = Galeri::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'user_id' => session('user.id'),
        ]);
        $galeri->media()->sync($this->prepareMediaSyncData($validated['items']));

        return redirect()->route('penulis.foto-bercerita.index')->with('success', 'Foto bercerita berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);
        $media = Media::where('tipe', 'foto')->latest()->get();

        return view('penulis.galeri.form', compact('galeri', 'media') + ['editMode' => true]);
    }

    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $validated = $this->validateGaleriRequest($request);

        $galeri->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);
        $galeri->media()->sync($this->prepareMediaSyncData($validated['items']));

        return redirect()->route('penulis.foto-bercerita.index')->with('success', 'Foto bercerita berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('penulis.foto-bercerita.index')->with('success', 'Foto bercerita berhasil dihapus.');
    }

    public function restore(string $id)
    {
        $galeri = Galeri::onlyTrashed()->findOrFail($id);
        $galeri->restore();

        return redirect()->route('penulis.foto-bercerita.index')->with('success', 'Foto bercerita berhasil dipulihkan.');
    }

    public function togglePublik(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->update(['is_publik' => !$galeri->is_publik]);

        $label = $galeri->is_publik ? 'ditampilkan di publik' : 'disembunyikan dari publik';

        return redirect()->back()->with('success', "Foto bercerita berhasil {$label}.");
    }

    public function forceDelete(string $id)
    {
        $galeri = Galeri::onlyTrashed()->findOrFail($id);
        $galeri->forceDelete();

        return redirect()->route('penulis.foto-bercerita.index', ['status' => 'terhapus'])->with('success', 'Foto bercerita berhasil dihapus permanen.');
    }

    private function validateGaleriRequest(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.media_id' => [
                'required',
                'integer',
                'distinct',
                Rule::exists('media', 'id')->where(static function ($query) {
                    $query->where('tipe', 'foto')->whereNull('deleted_at');
                }),
            ],
            'items.*.judul' => 'required|string|max:255',
            'items.*.keterangan_singkat' => 'nullable|string|max:500',
        ], [
            'items.required' => 'Minimal tambahkan 1 item foto bercerita.',
            'items.min' => 'Minimal tambahkan 1 item foto bercerita.',
            'items.*.media_id.required' => 'Setiap item wajib memilih foto dari Media.',
            'items.*.media_id.distinct' => 'Foto yang sama tidak boleh dipilih lebih dari satu kali.',
            'items.*.media_id.exists' => 'Foto yang dipilih harus berasal dari fitur Media.',
            'items.*.judul.required' => 'Judul item foto wajib diisi.',
        ]);
    }

    private function prepareMediaSyncData(array $items): array
    {
        $syncData = [];

        foreach (array_values($items) as $index => $item) {
            $syncData[(int) $item['media_id']] = [
                'judul_item' => $item['judul'],
                'keterangan_singkat' => $item['keterangan_singkat'] ?: null,
                'urutan' => $index + 1,
            ];
        }

        return $syncData;
    }
}
