<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index() {
        $highlights = Item::where('is_highlight', true)->orderBy('order')->limit(3)->get();
        $waNumber = Setting::get('whatsapp_number');
        return view('welcome', compact('highlights', 'waNumber'));
    }

    public function catalog() {
        $items = Item::orderBy('order')->get();
        $waNumber = Setting::get('whatsapp_number');
        return view('catalog', compact('items', 'waNumber'));
    }
    
}