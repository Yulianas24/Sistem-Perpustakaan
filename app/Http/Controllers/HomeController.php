<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;

class HomeController extends Controller
{
public function index()
 {
    $count = collect([
        'book' => Buku::all()->count(),
        'member' => Member::all()->count(),
        'peminjaman' => Peminjaman::all()->count(),
    ]);

    return view('dashboard', compact('count'));

}
}
