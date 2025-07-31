<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::latest()->paginate(10);

        return view('reservasi.index', [
            'reservasi' => $reservasi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Reservasi $reservasi, Request $request)
    {
        $request->validate([
            'status' => ['required'],
        ]);

        $reservasi->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
    }

    /**
     * page for reservasi
     */
    public function reservasi()
    {
        return view('pages.reservasi');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'jumlah_tamu' => ['required', 'integer', 'min:1'],
            'tanggal' => ['required', 'date', 'after_or_equal:'.now()->format('Y-m-d')],
            'jam' => ['required', 'date_format:H:i', 'after_or_equal:'.now()->format('H:i')],
        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.reservasi')->withErrors($validator)->withInput();
        }

        return redirect()->route('pages.order', [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jumlah_tamu' => $request->jumlah_tamu,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ])->with('success', 'Reservasi berhasil dibuat.');
    }

    /**
     * page for order
     */
    public function order(Request $request)
    {
        $categories = Category::query()->get();

        return view('pages.order', [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jumlah_tamu' => $request->jumlah_tamu,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'categories' => $categories,
        ]);
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function payment()
    {
        return view('pages.payment');
    }
}
