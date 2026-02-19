<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('order', 'asc')->get();
        return view('admin.dashboard', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_highlight' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle Upload Gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        // Handle Checkbox Highlight (null menjadi 0)
        $validated['is_highlight'] = $request->has('is_highlight') ? true : false;

        Item::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Item berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_highlight' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle Upload Gambar Baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($item->image && Storage::exists('public/' . $item->image)) {
                Storage::delete('public/' . $item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $validated['is_highlight'] = $request->has('is_highlight') ? true : false;

        $item->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Item berhasil diupdate!');
    }

    /**
     * Toggle highlight status (quick action)
     */
    public function toggleHighlight(Item $item)
    {
        $item->update(['is_highlight' => !$item->is_highlight]);
        return redirect()->back()->with('success', 'Status highlight diupdate!');
    }

    /**
     * Update harga cepat (quick action)
     */
    public function updatePrice(Request $request, Item $item)
    {
        $request->validate([
            'price' => 'required|numeric|min:0'
        ]);

        $item->update(['price' => $request->price]);
        return redirect()->back()->with('success', 'Harga diupdate!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Hapus file gambar dari storage jika ada
        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }

        $item->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Item berhasil dihapus!');
    }
}