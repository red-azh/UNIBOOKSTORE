<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }
    public function index()
    {
        $data = Buku::all();
        return view('buku.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('buku', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|min:3|max:10|unique:buku,kode',
            'kategori' => 'required|min:3|max:30|unique:buku,kategori',
            'nb' => 'required|min:3|max:255|unique:buku,nama_buku',
            'harga' => 'required|min:3|max:100',
            'stok' => 'required|max:100',
            'penerbit' => 'required|max:255'
            // 'jenis' => 'required|max:20|unique'
        ];

        // Bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong maseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute nama kategori maksimal 20 huruf',
            'unique' => ':attribute ini sudah ada'
        ];

        // Eksekusi validasi
        $request->validate($rules, $messages);

        // Pasangkan ke field table kiriman user
        $this->buku->kode = $request->kode;
        $this->buku->kategori = $request->kategori;
        $this->buku->nama_buku = $request->nb;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->penerbit = $request->penerbit;

        // Simpan ke database
        $this->buku->save();
        // Redirect
        return redirect()->route('buku.index');
        // with buat mirip mirp kayak tag session di web lanjutan
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Buku::FindOrFail($id);
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('data', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate(
            [
                'kode' => 'required|min:3|max:10|unique:buku,kode,' . $id,
                'kategori' => 'required|min:3|max:30|unique:buku,kategori,' . $id,
                'nb' => 'required|min:3|max:255|unique:buku,nama_buku,' . $id,
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|numeric|min:0',
                'penerbit' => 'required|max:255'
            ],
            [
                'required' => ':attribute tidak boleh kosong.',
                'min' => ':attribute minimal harus :min karakter.',
                'max' => ':attribute maksimal harus :max karakter.',
                'unique' => ':attribute sudah ada.'
            ]
        );

        // Update data buku
        $buku->update([
            'kode' => $validatedData['kode'],
            'kategori' => $validatedData['kategori'],
            'nama_buku' => $validatedData['nb'],
            'harga' => $validatedData['harga'],
            'stok' => $validatedData['stok'],
            'penerbit' => $validatedData['penerbit']
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'buku berhasil dihapus.');
    }
}
