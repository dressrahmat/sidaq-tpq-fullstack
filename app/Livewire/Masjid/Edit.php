<?php

namespace App\Livewire\Masjid;

use App\Models\Masjid;
use App\Helpers\Helper;
use Livewire\Component;

class Edit extends Component
{
    public $kodeProvinsi;
    public $wilayahProvinsi;
    public $wilayahKabupaten;
    public $masjidId;
    public $namaMasjid;
    public $email;
    public $provinsi;
    public $kabupaten;
    public $alamat;

    public function mount($id)
    {
        $this->masjidId = $id;
        $masjid = Masjid::whereHas('user.roles', function($query) {
            $query->where('name', 'admin');
        })->with('user')->find($id);
        $this->namaMasjid = $masjid->nama_masjid;
        $this->email = $masjid->user[0]->email;
        $this->provinsi = $masjid->user[0]->profile->provinsi; // Inisialisasi dengan kode provinsi yang tersimpan di database
        $this->kabupaten = $masjid->user[0]->profile->kabupaten; // Inisialisasi dengan kode provinsi yang tersimpan di database
        $this->alamat = $masjid->user[0]->profile->alamat;

        // Mengambil data provinsi dari helper
        $helper = new Helper();
        $this->wilayahProvinsi = $helper->provinsi();
        // Memperbarui daftar kabupaten saat halaman dimuat pertama kali
        $this->updateKabupaten($this->kodeProvinsi);
    }

    public function updatedKodeProvinsi($value)
    {
        // Panggil method untuk memperbarui daftar kabupaten setiap kali kode provinsi berubah
        $this->updateKabupaten($value);
    }

    public function updateKabupaten($kodeProvinsi)
    {
        // Buat instance dari class Helper
        $helper = new Helper();
    
        // Panggil fungsi kabupaten untuk mendapatkan daftar kabupaten yang sesuai dengan kode provinsi yang dipilih
        $this->wilayahKabupaten = $helper->kabupaten($kodeProvinsi);
    }

    public function update()
    {
        $this->validate([
            'namaMasjid' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $masjid = Masjid::find($this->masjidId);
        dd($masjid);
        $masjid->update([
            'nama_masjid' => $this->namaMasjid,
            'email' => $this->email,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Data masjid berhasil diperbarui.');

        return redirect()->route('masjid.index');
    }

    public function render()
    {
        return view('livewire.masjid.edit');
    }
}
