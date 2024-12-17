<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

use App\Models\Member;
use App\Models\Buku;


class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $peminjaman = Peminjaman::query();
        $peminjaman->where('status', 'Dipinjam');
        // Filter peminjaman sesuai dengan role pengguna
        if (auth()->user()->role === 'siswa') {
            $peminjaman->where('user_id', auth()->user()->id);
        }

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $peminjaman->whereHas('buku', function ($query) use ($searchTerm) {
                $query->where('nama_buku', 'like', '%' . $searchTerm . '%');
            });
        }


        if ($request->has('name') && !empty($request->name)) {
            $searchTermName = $request->name;
            $peminjaman->whereHas('user', function ($query) use ($searchTermName) {
                $query->where('nama', 'like', '%' . $searchTermName . '%');
            });
        }

        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            $peminjaman->where('status', $status);
        }
        $peminjaman = $peminjaman->paginate(10);
        return view('borrowing.index', compact('peminjaman'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Member::all();
        $buku = Buku::all();
        return view('borrowing.create', compact('users', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:buku,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        Peminjaman::create([
            'user_id' => $validatedData['user_id'],
            'buku_id' => $validatedData['book_id'],
            'tgl_peminjaman' => $validatedData['borrow_date'],
            'tgl_pengembalian' => $validatedData['return_date'],
            'status' => 'Dipinjam',
        ]);


        return redirect()->route('peminjaman-buku.index')->with('success', 'Peminjaman buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrowing = Peminjaman::findOrFail($id);
        // $fines = $borrowing->denda;

        // $users = User::all();

        return view('borrowing.show', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrowing = Peminjaman::findOrFail($id);
        $users = Member::all();

        return view('borrowing.edit', compact('borrowing', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'description' => 'nullable|string',
            'total_fine' => 'required|numeric',
        ]);

        $borrowing = Peminjaman::findOrFail($id);
        $borrowing->status = $validatedData['status'];
        $borrowing->deskripsi = $validatedData['description'];
        $borrowing->total_denda = $validatedData['total_fine'];

        $borrowing->save();

        return redirect()->route('peminjaman-buku.index')->with('success', 'Data peminjaman buku berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman-buku.index')
            ->with('success', 'Data peminjaman buku berhasil dihapus.');
    }


}
