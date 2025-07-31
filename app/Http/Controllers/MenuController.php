<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        // Eager‐load relasi kategori
        $menu     = Menu::with('category')->oldest()->paginate();
        $categories = Category::get();

        return view('menu.index', [
            'menu' => $menu,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'foto'        => ['required', 'image', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
            'nama'        => ['required', 'string', 'max:255'],
            'harga'       => ['required', 'integer', 'min:0'],
            'deskripsi'   => ['required', 'string', 'max:255'],
        ]);

        $validated['foto'] = $request->file('foto')->store('menus');

        Menu::create($validated);

        return redirect()->back()->with('success','Menu berhasil ditambahkan!');
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'foto'        => ['required', 'image', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
            'nama'        => ['required', 'string', 'max:255'],
            'harga'       => ['required', 'integer', 'min:0'],
            'deskripsi'   => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete($menu->foto);
            $validated['foto'] = $request->file('foto')->store('menus');
        } else {
            $validated['foto'] = $menu->foto;
        }

        // Update data
        $menu->update($validated);

        return redirect()->back()->with('success','Menu berhasil diperbarui!');
    }

    public function destroy(Menu $menu)
    {
        Storage::delete($menu->foto);

        $menu->delete();

        return redirect()->back()->with('success','Menu berhasil dihapus!');
    }
}
