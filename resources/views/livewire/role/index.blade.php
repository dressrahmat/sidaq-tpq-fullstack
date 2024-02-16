<div>
    <div class="flex gap-x-2">
        <div class="card card-side bg-base-100 shadow-xl">
            <div class="card-body">
                @if (session()->has('success'))
                <div x-data="{ showNotification: true }" x-show="showNotification"
                    x-init="setTimeout(() => showNotification = false, 2000)">
                    <!-- Notifikasi disini -->
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
                @endif
                <div class="flex justify-between items-center mx-4">
                    <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100 w-3/12 shadow-md">
                        <h1 class="text-xl font-bold">Data Role</h1>
                    </div>
                    <div>
                        <input type="text" wire:model.debounce.50ms="search" wire:keyup="refreshSearch"
                            class="border border-gray-300 px-3 py-1 mt-2 rounded-md" placeholder="Cari...">
                    </div>
                </div>
                <table class="table table-zebra text-base">
                    <!-- head -->
                    <thead class="text-lg">
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Jumlah User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->users->count() }}</td>
                            <td>
                                <button wire:click="show({{ $role->id }})" class="btn btn-xs btn-primary">Lihat Detail
                                </button>
                                <button wire:click="editAksi({{ $role->id }})" class="btn btn-xs btn-success">Edit
                                </button>
                                <button class="btn btn-xs bg-red-300" type="button" wire:click="delete({{ $role->id }})"
                                    wire:confirm="Are you sure you want to delete this post?">
                                    Delete post
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-5 w-1/4">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
        <div>
            @if ($update)
            @include('livewire.role.edit')
            @else
            @include('livewire.role.create')
            @endif
        </div>
    </div>
    <!-- Modal -->
    {{-- <dialog id="my_modal_1" class="modal" x-show="open" @close="open = false">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Modal Title</h3>
            <p class="py-4">Role ID: <span x-text="roleId"></span></p>
            <div class="modal-action">
                <button @click="open = false" class="btn">Close</button>
            </div>
        </div>
    </dialog> --}}
</div>
