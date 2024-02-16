<?php

namespace App\Livewire\Masjid;

use App\Models\User;
use App\Models\Masjid;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $id;
    public $search = '';

    protected $listeners = ['refreshSearch'];

    public function render()
    {
        $data = Masjid::whereHas('user.roles', function($query) {
            $query->where('name', 'admin');
        })->where('nama_masjid', 'like', '%' . $this->search . '%')->paginate(5);

        return view('livewire.masjid.index', compact('data'));
    }

    public function refreshSearch()
    {
        $this->resetPage();
    }

    public function show($id)
    {
        // Logika untuk menampilkan detail masjid
        // Anda dapat melakukan redirect ke halaman detail masjid
        return redirect()->route('masjid.show', $id);
    }

    public function edit($id)
    {
        // Logika untuk mengarahkan ke halaman edit masjid
        // Anda dapat melakukan redirect ke halaman edit masjid
        return redirect()->route('masjid.edit', $id);
    }

    public function delete($id)
    {
        // Logika untuk menghapus data masjid
        // Misalnya:
        User::findOrFail($id)->delete();

        // Refresh data
        $this->data = User::role('masjid')->with('profile')->get();
    }
}