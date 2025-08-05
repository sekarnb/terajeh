<?php

namespace App\Http\Controllers;

use App\Enums\ReservasiStatus;
use App\Models\Category;
use App\Models\Order;
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
     * Display the specified resource.
     */
    public function show(Reservasi $reservasi)
    {
        $totalPrice = $reservasi->orders->sum(fn ($order) => $order->menu->harga * $order->jumlah);

        return view('reservasi.show', [
            'reservasi' => $reservasi->load(['orders.menu']),
            'totalPrice' => $totalPrice,
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
            'jam' => ['required', 'date_format:H:i'],
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

    public function checkout(Request $request)
    {
        (array) $orderItems = $request->query('cart');

        if (!$orderItems) {
            return redirect()->route('pages.order')->with('error', 'No items in cart.');
        }

        // query the menu data from the order items
        (array) $menuItems = [];
        foreach ($orderItems as $item) {
            $menuItem = \App\Models\Menu::find($item['id']);

            if ($menuItem) {
                $menuItems[] = [
                    'id' => $menuItem->id,
                    'name' => $menuItem->nama,
                    'price' => $menuItem->harga,
                    'notes' => $item['notes'],
                    'quantity' => $item['quantity'],
                    'total' => $menuItem->harga * $item['quantity'],
                ];
            }
        }

        $totalPrice = array_reduce($menuItems, fn ($carry, $item) => $carry + $item['total'], 0);

        return view('pages.checkout', [
            'menuItems' => $menuItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function invoicing(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'jumlah_tamu' => ['required', 'integer', 'min:1'],
            'tanggal' => ['required', 'date', 'after_or_equal:'.now()->format('Y-m-d')],
            'jam' => ['required', 'date_format:H:i'],
            'menuItems' => ['required'],
        ]);

        $menuItems = json_decode($data['menuItems'], true);

        $reservasi = Reservasi::create([
            'nama_customer' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'jumlah_tamu' => $data['jumlah_tamu'],
            'tanggal' => $data['tanggal'],
            'jam' => $data['jam'],
            'total_bayar' => array_reduce($menuItems, fn ($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0),
            'status' => ReservasiStatus::PENDING,
        ]);

        foreach ($menuItems as $item) {
            Order::create([
                'reservasi_id' => $reservasi->id,
                'menu_id' => $item['id'],
                'jumlah' => $item['quantity'],
                'notes' => $item['notes'] ?? null,
            ]);
        }

        return redirect()->route('pages.payment', $reservasi->id)->with('success', 'Reservasi dan pesanan berhasil dibuat. Silakan unggah bukti pembayaran.');
    }

    public function payment(Reservasi $reservasi)
    {
        return view('pages.payment', [
            'reservasi' => $reservasi,
        ]);
    }

    public function proof(Reservasi $reservasi, Request $request)
    {
        $request->validate([
            'bukti_bayar' => ['required', 'image', 'max:2048'],
        ]);

        $path = $request->file('bukti_bayar')->store('bukti_bayar');

        $reservasi->update([
            'bukti_bayar' => $path,
            'status' => ReservasiStatus::PENDING,
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
