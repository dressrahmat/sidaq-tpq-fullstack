<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{

    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.role.edit', compact('permissions'));
    }

}
