<?php

namespace App\Livewire\Santri;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $userId;
    public $name;
    public $email;
    public $password;
    public $update = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'id_khidmat' => 'nullable',
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
        $role = User::findOrFail($id);
        $this->nameId = $role->name;
        $this->userId = $role->id;
    }

    public function edit()
    {
        $role = Role::find($this->userId);
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
        $santris = User::role('santri')->where('name', 'like', '%' . $this->search . '%')->paginate(5);
        $roles = Role::get();

        return view('livewire.santri.index', compact(['santris', 'roles']));
    }

    // Method untuk memperbarui pencarian saat input pencarian berubah
    public function updatingSearch()
    {
        $this->resetPage();
        $this->gotoPage(1);
    }
}
