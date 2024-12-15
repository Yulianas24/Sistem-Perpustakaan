<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Returbuku;
use App\Models\Setting;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;

class ReturnBookController extends Controller
{
    public function index(Request $request)
    {

        $settings = Setting::first();
        $pengembalian = Returbuku::query();

        if (auth()->user()->role === 'siswa') {
            $pengembalian->whereHas('peminjaman', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $pengembalian->whereHas('peminjaman.buku', function ($query) use ($searchTerm) {
                $query->where('nama_buku', 'like', '%' . $searchTerm . '%');
            });
        }


        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $pengembalian->whereHas('peminjaman.user', function ($query) use ($searchTermName) {
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
        $pengembalian = Returbuku::findOrFail($id);
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

        Returbuku::create([
            'peminjaman_id' => $validatedData['peminjaman_id'],
            'status' => $validatedData['status'],
            'deskripsi' => $validatedData['deskripsi'],
            'total_denda' => $validatedData['total_denda'],
        ]);

        $peminjaman = Peminjaman::findOrFail($validatedData['peminjaman_id']);
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();

        return redirect()->route('pengembalian-buku.index')->with('success', 'Data pengembalian buku berhasil disimpan. Silahkan tunggu persetujuan dari admin');
    }

    public function edit(string $id)
    {
        $pengembalian = Returbuku::findOrFail($id);
        return view('returnbook.edit', compact('pengembalian'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'string|required',
            'deskripsi' => 'string|required',
            'total_denda' => 'required',
        ]);

        $pengembalian = Returbuku::findOrFail($id);

        $pengembalian->status = $validatedData['statusy'];
        $pengembalian->deskripsi = $validatedData['deskripsiy'];
        $pengembalian->total_denda = $validatedData['total_denday'];
        $pengembalian->save();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $pengembalian = Returbuku::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian-buku.index')
            ->with('success', 'Data pengembalian buku berhasil dihapus.');
    }
}
