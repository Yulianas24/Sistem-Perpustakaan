<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $member = Member::query();


        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $member->where('nama', 'like', '%' . $searchTerm . '%');
        }

        $member = $member->paginate(10);
        return view('member.index', compact('member'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'nama' => 'required|string',
            'nisn' => 'required|string',
            'angkatan' => 'required|string',
        ]);

        Member::create([
            'nama' => $validatedData['nama'],
            'nisn' => $validatedData['nisn'],
            'angkatan' => $validatedData['angkatan'],
        ]);
        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = member::where('id', $id)->first();
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nisn' => 'required|string',
            'angkatan' => 'required|string',
        ]);

        $member = member::findOrFail($id);
        $member->nama = $validatedData['nama'];
        $member->nisn = $validatedData['nisn'];
        $member->angkatan = $validatedData['angkatan'];

        $member->save();
        return redirect()->route('member.index')->with('success', 'member berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);

        // $member->peminjaman()->delete();

        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Data Member berhasil dihapus.');
    }
}
