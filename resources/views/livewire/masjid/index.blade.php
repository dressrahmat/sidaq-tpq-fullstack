<div>
    @if (Session::has('message'))
    <div x-data="{ showNotification: true }" x-show="showNotification" x-init="setTimeout(() => showNotification = false, 2000)">
        <!-- Notifikasi disini -->
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ Session::get('message') }}</span>
        </div>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ Session::get('error') }}</span>
    </div>
    @endif
    <div class="flex justify-between items-center mx-4">
        <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100 w-3/12 shadow-md">
            <h1 class="text-2xl font-bold">Data Masjid</h1>
        </div>
        <div>
            <input type="text" wire:model.debounce.50ms="search" wire:keyup="refreshSearch" class="border border-gray-300 px-3 py-1 mt-2 rounded-md" placeholder="Cari...">
        </div>
    </div>
    <table class="table table-zebra text-base">
        <!-- head -->
        <thead class="text-lg">
            <tr>
                <th>No</th>
                <th>Nama Masjid</th>
                <th>Admin</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $masjid)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $masjid->nama_masjid }}</td>
                <td>Putri</td>
                <td>Pusat</td>
                <td>
                    <button wire:click="show({{ $masjid->id }})" class="btn btn-xs btn-primary">Lihat Detail</button>
                    <button wire:click="edit({{ $masjid->id }})" class="btn btn-xs btn-success">Edit</button>
                    <button wire:click="delete({{ $masjid->id }})" class="btn btn-xs btn-neutral">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5 w-1/4">
        {{ $data->links('livewire.custom-pagination-links', ['paginatorName' => 'masjid_' . $id]) }}
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshSearch', function () {
            Livewire.emit('refreshSearch');
        });
    });
</script>
@endpush