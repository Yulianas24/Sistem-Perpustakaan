<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Returbuku;

use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class ReturnBookController extends Controller
{
    public function index(Request $request)
    {


        $pengembalian = Peminjaman::where('status', 'Dikembalikan');

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $pengembalian->whereHas('buku', function ($query) use ($searchTerm) {
                $query->where('nama_buku', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $pengembalian->whereHas('user', function ($query) use ($searchTermName) {
                $query->where('nama', 'like', '%' . $searchTermName . '%');
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $pengembalian->where('status', $status);
        }
        $pengembalian = $pengembalian->paginate(10);

        return view('returnbook.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'Dipinjam')->get();
        return view('returnbook.create', compact('peminjaman'));
    }

    public function show(string $id)
    {
        $pengembalian = Peminjaman::findOrFail($id);
        return view('returnbook.show', compact('pengembalian'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'peminjaman_id' => 'required',
            'status' => 'string|required',
            'deskripsi' => 'string|required',
            'total_denda' => 'required',
            // 'photo' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $peminjaman = Peminjaman::findOrFail($validatedData['peminjaman_id']);
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->status_pengembalian = $validatedData['status'];
        $peminjaman->deskripsi = $validatedData['deskripsi'];
        $peminjaman->total_denda = $validatedData['total_denda'];

        $peminjaman->save();

        return redirect()->route('pengembalian-buku.index')->with('success', 'Data pengembalian buku berhasil disimpan. Silahkan tunggu persetujuan dari admin');
    }

    public function edit(string $id)
    {
        $pengembalian = Peminjaman::findOrFail($id);
        return view('returnbook.edit', compact('pengembalian'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'string|required',
            'deskripsi' => 'string|required',
            'total_denda' => 'required',
        ]);

        $pengembalian = Peminjaman::findOrFail($id);

        $pengembalian->status_pengembalian = $validatedData['status'];
        $pengembalian->deskripsi = $validatedData['deskripsi'];
        $pengembalian->total_denda = $validatedData['total_denda'];
        $pengembalian->save();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pengembalian = Peminjaman::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil dihapus.');
    }
}
