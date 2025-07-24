<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        // Eager‐load relasi kategori
        $menus     = Menu::with('kategori')->oldest()->get();
        $kategoris = Kategori::all();

        return view('menu.index', compact('menus','kategoris'));
    }

    public function store(Request $request)
    {
        // Bersihkan harga: hanya digit
        $hargaClean = preg_replace('/\D/', '', $request->harga);
        $request->merge(['harga' => $hargaClean]);

        // Validasi input
        $validated = $request->validate([
            'foto'        => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'nama_menu'   => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string|max:255',
        ]);

        // Simpan file foto ke storage/app/public/menus
        $path = $request->file('foto')->store('menus','public');

        // Simpan record
        Menu::create([
            'foto'        => $path,
            'nama_menu'   => $validated['nama_menu'],
            'kategori_id' => $validated['kategori_id'],
            'harga'       => $validated['harga'],
            'deskripsi'   => $validated['deskripsi'],
        ]);

        return redirect()->route('menu.index')
                         ->with('success','Menu berhasil ditambahkan!');
    }

    public function show(Menu $menu)
    {
        // (tidak dipakai di view—boleh dihapus)
        return response()->json($menu);
    }

    public function update(Request $request, Menu $menu)
    {
        $hargaClean = preg_replace('/\D/', '', $request->harga);
        $request->merge(['harga' => $hargaClean]);

        $validated = $request->validate([
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'nama_menu'   => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string|max:255',
        ]);

        // Jika upload foto baru
        if ($request->hasFile('foto')) {
            if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
                Storage::disk('public')->delete($menu->foto);
            }
            $menu->foto = $request->file('foto')->store('menus','public');
        }

        // Update data
        $menu->update([
            'nama_menu'   => $validated['nama_menu'],
            'kategori_id' => $validated['kategori_id'],
            'harga'       => $validated['harga'],
            'deskripsi'   => $validated['deskripsi'],
        ]);

        return redirect()->route('menu.index')
                         ->with('success','Menu berhasil diperbarui!');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
            Storage::disk('public')->delete($menu->foto);
        }
        $menu->delete();

        return redirect()->route('menu.index')
                         ->with('success','Menu berhasil dihapus!');
    }
}
