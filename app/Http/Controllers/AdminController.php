<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $items = MenuItem::orderBy('sort_order')->get();
        return view('admin.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'category' => 'required|string',
            'sizes'    => 'required|string', // JSON string from form
        ]);

        MenuItem::create([
            'name'            => $request->name,
            'description'     => $request->description,
            'category'        => $request->category,
            'image_url'       => $request->image_url,
            'is_available'    => $request->has('is_available'),
            'has_spice_level' => $request->has('has_spice_level'),
            'sort_order'      => $request->sort_order ?? 0,
            // Decode JSON strings from the dynamic form fields
            'sizes'           => json_decode($request->sizes, true),
            'addons'          => $request->addons ? json_decode($request->addons, true) : null,
        ]);

        return redirect('/admin')->with('success', 'Menu item added!');
    }

    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $item->update([
            'name'            => $request->name,
            'description'     => $request->description,
            'category'        => $request->category,
            'image_url'       => $request->image_url,
            'is_available'    => $request->has('is_available'),
            'has_spice_level' => $request->has('has_spice_level'),
            'sort_order'      => $request->sort_order ?? 0,
            'sizes'           => json_decode($request->sizes, true),
            'addons'          => $request->addons ? json_decode($request->addons, true) : null,
        ]);

        return redirect('/admin')->with('success', 'Menu item updated!');
    }

    public function destroy($id)
    {
        MenuItem::findOrFail($id)->delete();
        return redirect('/admin')->with('success', 'Menu item deleted!');
    }

    public function settings()
    {
        $settings = SiteSetting::all()->keyBy('key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        // Loop through all submitted settings and save each one
        foreach ($request->except('_token') as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect('/admin/settings')->with('success', 'Settings updated!');
    }
}