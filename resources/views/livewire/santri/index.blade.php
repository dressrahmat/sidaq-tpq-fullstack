<div class="flex gap-x-3">
    <div>
        <div class="flex justify-between items-center mx-4">
            <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100 w-3/12 shadow-md">
                <h1 class="text-2xl font-bold">Data Santri</h1>
            </div>
            <div>
                <input type="text" wire:model="search" class="border border-gray-300 px-3 py-1 mt-2 rounded-md" placeholder="Cari...">
            </div>
        </div>
    
        <div class="card card-side bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="table table-zebra text-base">
                        <!-- head -->
                        <thead class="text-lg">
                            <tr>
                                <th>No</th>
                                <th>Nama Masjid</th>
                                <th>Email</th>
                                <th>Kabupaten/Kota</th>
                                <th>Provinsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santris as $santri)
                            <tr>
                                <td>{{ $santris->firstItem() + $loop->index }}</td>
                                <td>{{ $santri->name }}</td>
                                <td>{{ $santri->email }}</td>
                                <td>{{ $santri->profile->kota }}</td>
                                <td>{{ $santri->profile->provinsi }}</td>
                                <td>
                                    <details class="dropdown">
                                        <summary class="m-1 btn bg-violet-400">
                                            <i class="fa fa-solid fa-eye"></i>
                                        </summary>
                                        <ul class="absolute -left-16 p-2 shadow menu dropdown-bottom z-[1] bg-neutral-content rounded-box w-32">
                                            <li><button wire:click="show({{ $santri->id }})"
                                                    class="btn btn-xs btn-primary">
                                                    Detail</button></li>
                                            <li>
                                                <button wire:click="editAksi({{ $santri->id }})"
                                                    class="btn btn-xs btn-success">
                                                    edit
                                                </button>
                                            </li>
                                            <li><button wire:click="delete({{ $santri->id }})"
                                                    class="btn btn-xs btn-neutral">Hapus</button></li>
                                        </ul>
                                    </details>
    
    
    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="my-5">
            {{ $santris->links() }}
        </div>
    </div>
    <div>
        @if ($update)
        @include('livewire.santri.update')
        @else
        @include('livewire.santri.create')
        @endif
    </div>
</div>