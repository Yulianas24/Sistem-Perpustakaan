<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Kategori::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $kategori->where('nama', 'like', '%' . $searchTerm . '%');
        }

        $kategori = $kategori->paginate(10);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'nama' => 'required|string'
        ]);

        Kategori::create([
            'nama' => $validatedData['nama'],
        ]);
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama = $validatedData['nama'];

        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->peminjaman()->delete();
        // $kategori->returkategori()->delete();

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus.');
    }

}
