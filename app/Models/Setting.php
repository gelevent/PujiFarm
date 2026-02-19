<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // Helper untuk mengambil value setting
    public static function get($key, $default = '')
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    // Helper untuk menyimpan value setting
    public static function set($key, $value)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}