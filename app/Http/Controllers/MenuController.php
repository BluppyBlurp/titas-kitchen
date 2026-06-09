<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        // Group menu items by category, only available ones
        $menu = MenuItem::where('is_available', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('menu.index', compact('menu'));
    }
}