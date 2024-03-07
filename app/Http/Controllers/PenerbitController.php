<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public $penerbit;
    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
    public function index()
    {
        $data = Penerbit::all();
        return view('penerbit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|min:3|max:20|unique:penerbit,kode',
            'nama' => 'required|min:3|max:20|unique:penerbit,nama',
            'alamat' => 'required|min:3|max:255|unique:penerbit,alamat',
            'kota' => 'required|min:3|max:50|unique:penerbit,kota',
            'telp' => 'required|min:3|max:15|unique:penerbit,telepon'
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
        $this->penerbit->kode = $request->kode;
        $this->penerbit->nama = $request->nama;
        $this->penerbit->alamat = $request->alamat;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telepon = $request->telp;

        // Simpan ke database
        $this->penerbit->save();
        // Redirect
        return redirect()->route('penerbit.index');
        // with buat mirip mirp kayak tag session di web lanjutan
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Penerbit::FindOrFail($id);
        return view('penerbit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Penerbit::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'kode' => 'required|min:3|max:5' . $id,
            'nama' => 'required|min:3|max:20|unique:penerbit,nama,' . $id,
            'alamat' => 'required|min:3|max:255|unique:penerbit,alamat,' . $id,
            'kota' => 'required|min:3|max:50|unique:penerbit,kota,' . $id,
            'telp' => 'required|min:3|max:15|unique:penerbit,telepon,' . $id
        ]);

        // Perbarui atribut Penerbit
        $data->update($validatedData);

        // Redirect
        return redirect()->route('penerbit.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        // Hapus penerbit
        $penerbit->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }

}
