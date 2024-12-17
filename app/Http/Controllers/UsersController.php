<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $users->where('nama', 'like', '%' . $searchTerm . '%');
        }

        $users = $users->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'role' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'telepon' => $validatedData['telepon'],
            'role' => $validatedData['role'],
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::where('id', $id)->first();
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'role' => 'required|string',
        ]);
        if($users->email != $request->email) {
            $request->validate([
                'email' => 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class
            ]);
            $users->email = $validatedData['email'];
        }

        $users->nama = $validatedData['nama'];
        $users->telepon = $validatedData['telepon'];
        $users->role = $validatedData['role'];

        $users->save();
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('users.index')->with('success', 'Data User berhasil dihapus.');
    }

}
