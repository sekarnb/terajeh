<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(10);

        return view('kategori.index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name']
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');

    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', "unique:categories,name,{$category->id}"]
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
