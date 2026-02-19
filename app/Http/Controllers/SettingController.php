<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $waNumber = Setting::get('whatsapp_number', '');
        return view('admin.settings', compact('waNumber'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'whatsapp_number' => 'required|string|max:20'
        ]);

        Setting::set('whatsapp_number', $request->whatsapp_number);
        
        return redirect()->route('admin.settings')->with('success', 'Nomor WhatsApp berhasil diupdate!');
    }
}