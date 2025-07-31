<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get();

        return view('pages.index', [
            'categories' => $categories,
        ]);
    }
}
