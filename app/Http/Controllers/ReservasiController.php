<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pakai paginate agar tampil pagination di view
        $reservasis = Reservasi::latest()->paginate(10);

        return view('reservasi.index', compact('reservasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi sesuai nama kolom di DB dan view
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'nomor_hp'      => 'required|integer|max:20',
            'jumlah_tamu'   => 'required|integer|min:1',
            'tanggal'       => 'required|date',
            'waktu'         => 'required|string|max:10',
            'total_bayar'   => 'required|integer|min:0',
            'status'        => 'required|in:pending,selesai',
            'bukti'         => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        // jika ada file bukti, simpan ke storage
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti', 'public');
            $validated['bukti'] = basename($path);
        }

        Reservasi::create($validated);

        return redirect()
            ->route('reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource as JSON (untuk modal detail).
     */
    public function show(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return response()->json($reservasi);
    }

    /**
     * Mark booking as finished.
     */
    public function selesai(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update(['status' => 'selesai']);

        return redirect()
            ->route('reservasi.index')
            ->with('success', 'Reservasi berhasil diselesaikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // cukup delete record, jangan hapus file bukti di storage
    $reservasi = Reservasi::findOrFail($id);
    $reservasi->delete();

    return redirect()
        ->route('reservasi.index')
        ->with('success', 'Reservasi berhasil dihapus.');
}
}
