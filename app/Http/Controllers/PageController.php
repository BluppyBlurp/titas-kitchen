<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function landing()
    {
        $settings = [
            'hero_tagline' => SiteSetting::get('hero_tagline'),
            'hero_sub'     => SiteSetting::get('hero_sub'),
            'about_name'   => SiteSetting::get('about_name'),
            'about_text'   => SiteSetting::get('about_text'),
            'about_image'  => SiteSetting::get('about_image'),
            'footer_note'  => SiteSetting::get('footer_note'),
        ];

        $showcase = MenuItem::where('is_available', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        // Grouped by category for menu flipbook
        $menu = MenuItem::where('is_available', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('landing', compact('settings', 'showcase', 'menu'));
    }

    public function cart()
    {
        $messenger = env('MESSENGER_USERNAME', 'me');
        return view('cart.index', compact('messenger'));
    }
}