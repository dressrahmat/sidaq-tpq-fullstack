<div class="w-full">
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
                            @foreach ($ustadzProfiles as $ustadz)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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
        {{ $ustadzProfiles->links() }}
    </div>
    <div>
        <div class="border-l-8 border-accent px-4 py-4 my-2 bg-gray-100 w-3/12 shadow-md">
            <h1 class="text-2xl font-bold">Data Santri</h1>
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
                            @foreach ($santriProfiles as $santri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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
                                                <button wire:click="edit({{ $santri->id }})"
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
            {{ $santriProfiles->links() }}
        </div>
    </div>

    <!-- Modal -->
    @if($modalVisible)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <!-- Isi modal -->
                <div class="p-6">
                    @if ($santriDetail)
                    <h3 class="font-bold text-lgm mb-2">Nama : {{ $santriDetail->name }}</h3>
                    <p class="text-base">Alamat: {{ $santriDetail->profile->alamat }}</p>
                    <p class="text-base">Kota: {{ $santriDetail->profile->kota }}</p>
                    <p class="text-base">Provinsi: {{ $santriDetail->profile->provinsi }}</p>
                    <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                    @endif
                </div>
                <!-- Tombol untuk menutup modal -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeModal()" type="button" class="btn btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>