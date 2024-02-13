<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MasjidIndex extends Component
{
    public $data;

    public function mount()
    {
        $this->data = User::role('masjid')->get();
    }

    public function render()
    {
        return view('livewire.masjid-index');
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
