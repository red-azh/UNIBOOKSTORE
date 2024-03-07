<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('search');

        // Ambil semua data buku dan penerbit
        $data = Buku::query();
        $penerbit = Penerbit::all();
        $buku = Buku::all();

        // Jika ada pencarian, tambahkan kondisi pencarian
        if ($cari) {
            $data->where('nama_buku', 'LIKE', "%$cari%");
        }

        // Ambil hasil dari query
        $data = $data->get();

        return view('master.app', compact('cari', 'data', 'penerbit','buku'));
    }


}
