<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        // Eager‐load relasi kategori
        $menus     = Menu::with('kategori')->oldest()->get();
        $kategoris = Kategori::all();
        return view('landing.index' , compact('menus','kategoris'));
    }


}
