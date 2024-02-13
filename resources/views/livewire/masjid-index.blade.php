<div>
    <h1 class="text-3xl font-bold mb-5">Data Masjid</h1>
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
            @foreach ($data as $masjid)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masjid->name }}</td>
                    <td>{{ $masjid->email }}</td>
                    <td>{{ $masjid->profile->kota }}</td>
                    <td>{{ $masjid->profile->provinsi }}</td>
                    <td>
                        <button wire:click="show({{ $masjid->id }})" class="btn btn-xs btn-primary">Lihat Detail</button>
                        <button wire:click="edit({{ $masjid->id }})" class="btn btn-xs btn-success">Edit</button>
                        <button wire:click="delete({{ $masjid->id }})" class="btn btn-xs btn-neutral">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>