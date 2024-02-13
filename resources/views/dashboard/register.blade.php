@extends('dashboard.layouts.auth')
@section('content')
<div class="card-body py-2">
    <div>
        <h2 class="text-3xl font-bold text-slate-700 mb-2">Bismillah!</h2>
        <p class="text-base-content">Daftar Masjid</p>
    </div>
    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Masjid -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Nama Masjid</span>
                </div>
                <input type="text" name="nama_masjid" id="nama_masjid" placeholder="Masukkan nama masjid"
                    class="input input-bordered w-full max-w-lg" required autofocus />
            </label>
        </div>

        <!-- Email -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Email</span>
                </div>
                <input type="email" name="email" id="email" placeholder="Masukkan alamat email"
                    class="input input-bordered w-full max-w-lg" required />
            </label>
        </div>
                        
        <!-- Password -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Password</span>
                </div>
                <input type="password" name="password" id="password" placeholder="Masukkan password"
                    class="input input-bordered w-full max-w-lg" required />
            </label>
        </div>

        <!-- Alamat -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Alamat</span>
                </div>
                <textarea name="alamat" id="alamat" placeholder="Masukkan alamat masjid"
                    class="textarea textarea-bordered w-full max-w-lg" required></textarea>
            </label>
        </div>

        <!-- Provinsi dan Kabupaten -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- Provinsi -->
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Pilih Provinsi</span>
                </div>
                <select name="provinsi" id="provinsi"
                    class="select select-bordered w-full max-w-lg">
                    <option value="" selected disabled>Pilih Provinsi</option>
                    <!-- Opsional: Anda dapat mengisi opsi dari data yang ada -->
                </select>
            </label>

            <!-- Kabupaten -->
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Pilih Kabupaten</span>
                </div>
                <select name="kabupaten" id="kabupaten"
                    class="select select-bordered w-full max-w-lg">
                    <option value="" selected disabled>Pilih Kabupaten</option>
                    <!-- Opsional: Anda dapat mengisi opsi dari data yang ada -->
                </select>
            </label>
        </div>

        <!-- Upload Foto -->
        <div>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                    <span class="label-text">Upload Foto</span>
                </div>
                <input type="file" name="foto" id="foto" accept="image/*" class="file-input w-full max-w-lg">
            </label>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-full text-lg">Daftar</button>
            <p class="text-center">Sudah Memiliki Akun Masjid ? <a href="{{route('login')}}" class=" text-primary">Masuk</a></p>
        </div>
    </form>
</div>
@endsection