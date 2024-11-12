<?php

namespace App\Http\Controllers;

use App\Models\Pemateri;
use Illuminate\Http\Request;

class PemateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pemateris = Pemateri::all(); // Pastikan model Pemateri sudah ada
    return view('pemateri.index', compact('pemateris')); 
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan', // Gender hanya boleh Laki-laki atau Perempuan
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
        ]);

        try {
            // Simpan data ke database
            Pemateri::create([
                'nama' => $request->nama,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
            ]);

            // Redirect ke halaman pemateri dengan pesan sukses
            return redirect()->route('pemateri.index')->with('success', 'Data pemateri berhasil disimpan.');
        } catch (\Exception $e) {
            // Redirect kembali jika terjadi error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemateris = Pemateri::findOrFail($id);
        return view('pemateri.edit', compact('pemateris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|string',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $pemateris = Pemateri::findOrFail($id);
        $pemateris->update([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->route('pemateri.index')->with('success', 'Pemateri berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemateris = Pemateri::findOrFail($id);
        $pemateris->delete();

        return redirect()->route('pemateri.index')->with('success', 'Pemateri berhasil dihapus');
    }
}
