<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\Pemateri;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data webinar dengan relasi pemateri
        $webinars = Webinar::with('pemateri')->get();
        $pemateris = Pemateri::all(); // Ambil semua data pemateri untuk form create

        return view('webinar.index', compact('webinars', 'pemateris'));
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
        // Validasi input
        $validatedData = $request->validate([
            'pemateri_id' => 'required|exists:pemateris,id', // Pastikan ID pemateri valid
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'lokasi'      => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'biaya'       => 'required|numeric',
            'status'      => 'required|string|in:akan_datang,selesai',
        ]);

        // Simpan data ke database
        Webinar::create($validatedData);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Webinar berhasil ditambahkan.');
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
    public function edit($id)
    {
        $webinars = Webinar::findOrFail($id);
        $pemateris = Pemateri::all();
        return view('webinar.edit', compact('webinars', 'pemateris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pemateri_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'biaya' => 'required|numeric',
            'status' => 'required|in:akan_datang,selesai'
        ]);

        $webinars = Webinar::findOrFail($id);
        $webinars->update($request->all());

        return redirect()->route('webinar.index')->with('success', 'Webinar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $webinars = Webinar::findOrFail($id);
        $webinars->delete();

        return redirect()->route('webinar.index')->with('success', 'Webinar berhasil dihapus');
    }
}
