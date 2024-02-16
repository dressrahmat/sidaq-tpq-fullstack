<?php

namespace App\Livewire\Ustadz;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $id;
    public function render()
    {
        $id = $this->id;

        $ustadzs = User::whereHas('profile', function ($query) use ($id) {
            $query->where('id_khidmat', $id);
        })->paginate(5);

        return view('livewire.ustadz.index', compact('ustadzs'));
    }
}
