<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use  App\Models\Returbuku;
use  App\Models\Kategori;
use App\Models\Setting;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::first();
        $buku = Buku::query();
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $buku->where('nama_buku', 'like', '%' . $searchTerm . '%');
        }
        $buku = $buku->paginate(10);
        return view('book.index', compact('settings', 'buku'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('book.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_title' => 'required|string',
            'author' => 'required|string',
            'release_year' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'photo' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }
        Buku::create([
            'nama_buku' => $validatedData['book_title'],
            'kategori_id' => $validatedData['kategori_id'],
            'penulis' => $validatedData['author'],
            'tahun_rilis' => $validatedData['release_year'],
            'photo' => $photoPath,
        ]);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::all();

        $book = Buku::where('id', $id)->first();
        return view('book.edit', compact('book', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'book_title' => 'required|string',
            'author' => 'required|string',
            'release_year' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'photo' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $book = Buku::findOrFail($id);
        $book = Buku::findOrFail($id);
        $book->nama_buku = $validatedData['book_title'];
        $book->kategori_id = $validatedData['kategori_id'];
        $book->penulis = $validatedData['author'];
        $book->tahun_rilis = $validatedData['release_year'];
        if($photoPath) {
            $book->photo = $photoPath;
        }
        $book->save();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->peminjaman()->delete();

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data Buku berhasil dihapus.');
    }

}
