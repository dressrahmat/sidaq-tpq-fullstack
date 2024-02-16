<div class="mb-10">
    <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100 w-3/12 shadow-md">
        <h1 class="text-2xl font-bold">Data Ustadz</h1>
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
                        @foreach ($ustadzs as $ustadz)
                        <tr>
                            <td>{{ $ustadzs->firstItem() + $loop->index }}</td>
                            <td>{{ $ustadz->name }}</td>
                            <td>{{ $ustadz->email }}</td>
                            <td>{{ $ustadz->profile->kota }}</td>
                            <td>{{ $ustadz->profile->provinsi }}</td>
                            <td>
                                <button wire:click="show({{ $ustadz->id }})" class="btn btn-xs btn-primary">Lihat
                                    Detail</button>
                                <button wire:click="edit({{ $ustadz->id }})"
                                    class="btn btn-xs btn-success">Edit</button>
                                <button wire:click="delete({{ $ustadz->id }})"
                                    class="btn btn-xs btn-neutral">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="my-5 w-1/4">
        {{ $ustadzs->links('livewire.custom-pagination-links', ['paginatorName' => 'ustadz_' . $id]) }}
    </div>
</div>