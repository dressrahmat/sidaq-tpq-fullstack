<?php

namespace App\Livewire\Santri;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination;
    public $id;
    public $search = '';

    // Untuk memperbarui pencarian saat perubahan halaman
    protected $updatesQueryString = ['search'];

    public function render()
    {
        $id = $this->id;
        $idUstadz = User::whereHas('profile', function($query) use ($id){
            $query->where('id_khidmat', $id);
        })->pluck('id');

        $query = User::whereHas('profile', function($query) use ($idUstadz){
            $query->whereIn('id_khidmat', $idUstadz);
        });

        // Menambahkan kondisi pencarian jika ada
        if ($this->search !== "") {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        // Mengambil data dengan paginasi
        $santris = $query->paginate(5);

        return view('livewire.santri.index', compact('santris'));
    }

    // Method untuk memperbarui pencarian saat input pencarian berubah
    public function updatingSearch()
    {
        $this->resetPage();
        $this->gotoPage(1);
    }
}
