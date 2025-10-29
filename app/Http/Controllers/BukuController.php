<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::query();

        if ($request->filled('q')) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        switch ($request->order) {
            case 'descending':
                $query->orderBy('tgl_terbit', 'asc');
                break;
            case '5newest':
                $query->orderBy('tgl_terbit', 'desc')->take(5);
                break;
            case '5oldest':
                $query->orderBy('tgl_terbit', 'asc')->take(5);
                break;
            default:
                $query->orderBy('tgl_terbit', 'desc');
        }

        if ($request->filled('penulis') && $request->penulis !== 'Semua Penulis') {
            $query->where('penulis', $request->penulis);
        }

        $data_buku_semua = Buku::All();
        $data_buku = $query->paginate(10);
        $data_penulis = Buku::select('penulis')->distinct()->get();
        $total_buku = Buku::count();
        $total_harga_buku = Buku::sum('harga');
        $buku_termahal  = Buku::max('harga');
        $buku_termurah  = Buku::min('harga');

        return view('buku.index', compact(
            'data_buku',
            'data_penulis',
            'total_buku',
            'total_harga_buku',
            'data_buku_semua',
            'buku_termahal',
            'buku_termurah'
        ))->with('keyword', $request->q);
    }

    public function create()
    {   
        $data_buku_semua = Buku::All();
        $total_buku = Buku::count();
        $total_harga_buku = Buku::sum('harga');
        $buku_termahal  = Buku::max('harga');
        $buku_termurah  = Buku::min('harga');
        
        return view('buku.create', compact('data_buku_semua', 'total_buku','total_harga_buku',
            'data_buku_semua',
            'buku_termahal',
            'buku_termurah' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|integer',
            'tgl_terbit' => 'required|date',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        $data_buku_semua = Buku::All();
        $data_penulis = Buku::select('penulis')->distinct()->get();
        $total_buku = Buku::count();
        $total_harga_buku = Buku::sum('harga');
        $buku_termahal  = Buku::max('harga');
        $buku_termurah  = Buku::min('harga');
        return view('buku.edit', compact('buku', 'data_penulis',
            'total_buku',
            'total_harga_buku',
            'data_buku_semua',
            'buku_termahal',
            'buku_termurah'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|integer',
            'tgl_terbit' => 'required|date',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}