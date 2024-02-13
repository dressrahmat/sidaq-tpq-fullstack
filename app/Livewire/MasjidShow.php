<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class MasjidShow extends Component
{
    use WithPagination;

    public $santriDetail;
    public $modalVisible = false;

    public function mount($id)
    {
        // Ambil data ustadz
        $this->ustadzProfiles = User::whereHas('profile', function (Builder $query) use ($id) {
            $query->where('id_khidmat', $id);
        })->paginate(5);

        // Ambil data santri yang memiliki id_khidmat yang sesuai dengan id ustadz
        $ustadzIds = $this->ustadzProfiles->pluck('profile.id_user');
        
        $this->santriProfiles = User::whereHas('profile', function (Builder $query) use ($ustadzIds) {
            $query->whereIn('id_khidmat', $ustadzIds);
        })->paginate(5);
    }
    
    public function render()
    {
        return view('livewire.masjid-show', [
            'ustadzProfiles' => $this->ustadzProfiles,
            'santriProfiles' => $this->santriProfiles,
        ]);
    }

    public function show($santriId)
    {
        // Di sini Anda bisa mengambil data santri berdasarkan ID dari database
        // Contoh:
        $this->santriDetail = User::find($santriId);

        // Tampilkan modal
        $this->modalVisible = true;
    }

    public function closeModal()
    {
        // Sembunyikan modal
        $this->modalVisible = false;
    }
}
