<?php
namespace App\Helpers;

use App\Models\Wilayah;

class Helper {

    public function provinsi() {
        // Mendapatkan semua data wilayah
        $data = Wilayah::get()->pluck('kode', 'nama');

        // Membuat array kosong untuk provinsi
        $provinsi = [];

        // Memfilter data untuk mendapatkan provinsi
        $provinsi = $data->filter(function ($value, $key) {
            // Mengembalikan true jika tidak terdapat tanda titik pada kode
            return strpos($value, '.') === false;
        });

        return $provinsi;

    }

    public function kabupaten($kodeProvinsi) {

        $data = Wilayah::where('kode', 'like', $kodeProvinsi . '.%')
                        ->whereRaw('LENGTH(kode) = ?', [strlen($kodeProvinsi) + 3])
                        ->get()
                        ->pluck('kode', 'nama');
    
        return $data;
    }
}