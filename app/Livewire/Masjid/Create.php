<?php

namespace App\Livewire\Masjid;

use App\Models\User;
use App\Models\Masjid;
use App\Helpers\Helper;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $kodeProvinsi;
    public $provinsi;
    public $kabupaten;
    public $prov;
    public $kab;
    public $namaMasjid;
    public $email;
    public $password;
    public $alamat;
    public $uploadFoto;

    public function mount()
    {
        // Inisialisasi properti
        $this->kodeProvinsi = '';

        // Mengambil data provinsi dari helper
        $helper = new Helper();
        $this->provinsi = $helper->provinsi();

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
        $this->kabupaten = $helper->kabupaten($kodeProvinsi);
    }

    public function rules()
    {
        return [
            'namaMasjid' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'prov' => 'required|string|max:255',
            'kab' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'uploadFoto' => 'nullable|image|max:1024',
        ];
    }

    public function register()
    {
        try {
            $validatedData = $this->validate([
                'namaMasjid' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'prov' => 'required',
                'kab' => 'required',
                'alamat' => 'required|string',
            ]);
    
            // Simpan data user
            DB::beginTransaction();

            // Simpan data masjid
            $masjid = Masjid::create([
                'nama_masjid' => $validatedData['namaMasjid'],
            ]);

            $user = User::create([
                'name' => $validatedData['namaMasjid'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'id_masjid' => $masjid->id,
            ]);

            $user->assignRole('admin');
    
            // Simpan data profile
            $profile = Profile::create([
                'id_user' => $user->id,
                'provinsi' => $validatedData['prov'],
                'kabupaten' => $validatedData['kab'],
                'alamat' => $validatedData['alamat'],
            ]);
            
            DB::commit();
            
            // Reset field setelah disimpan
            $this->reset();
    
            // Jika diperlukan, Anda bisa menambahkan pesan sukses atau melakukan tindakan lain setelah penyimpanan data
            session()->flash('message', 'Registrasi berhasil!');
            return redirect()->route('masjid.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Gagal melakukan registrasi: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function render()
    {
        // Render view dengan data terbaru
        return view('livewire.masjid.create');
    }
}
