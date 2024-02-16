<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $roleId;
    public $name;
    public $nameId;
    public $update = false;
    public $deleteId; // Menambahkan properti deleteId

    protected $rules = [
        'name' => 'required',
    ];

    public function resetFields()
    {
        $this->name = '';
    }

    public function cancel()
    {
        $this->update = false;
        $this->resetFields();
    }

    public function store()
    {
        // Validate Form Request
        $this->validate();
        try {
            // Create Role
            Role::create([
                'name' => $this->name,
            ]);
            // Set Flash Message
            session()->flash('success', 'Role Berhasil Dibuat!!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error', 'Something goes wrong while creating role!!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
        }
    }

    public function editAksi($id = null)
    {
        $this->update = true;
        $role = Role::findOrFail($id);
        $this->nameId = $role->name;
        $this->roleId = $role->id;
    }

    public function edit()
    {
        $role = Role::find($this->roleId);
        // Validate request
        $this->validate();
        try {
            // Update category
            $role->fill([
                'name' => $this->name,
            ])->save();

            session()->flash('success', 'Role Updated Successfully!!');

            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating role!!');
            $this->cancel();
        }
    }

    public function delete($id)
    {
        try {
            // Lakukan operasi penghapusan data sesuai dengan $deleteId
            Role::findOrFail($id)->delete();
    
            // Setelah penghapusan berhasil, atur pesan sukses
            session()->flash('success', 'Role successfully deleted.');
        } catch (\Exception $e) {
            // Jika ada kesalahan saat penghapusan, atur pesan error
            session()->flash('error', 'Failed to delete role.');
        }
    }

    public function render()
    {
        // Ambil data roles
        $permissions = Permission::all();
        $data = Role::paginate(5);

        return view('livewire.role.index', compact(['data', 'permissions']));
    }
}
